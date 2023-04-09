<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
    }
    // トップページの表示
    public function index()
    {
        echo view('templates/header.php' , ['title' => "TOP"]);
        echo view( 'auth/top' );
        echo view('templates/footer.php');
    }
    
    // アカウント登録ページの表示
    public function sign_up()
    {
        echo view( 'auth/signup' );
    }

    // 登録アカウントの保存
    public function save_account()
    {
        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]'
        ];
        
        if ( $this->validate($rules) ) {
            $userModel = new UserModel();

            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => url_title($this->request->getVar('email')),
                'password'  => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            ];
            $userModel->save($data);
            $user = $userModel->where('email' , $data['email'])->first();
            $ses_data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
                'isLoggedIn' => true,
                'msg' => 'アカウントが登録されました！新規アカウントでログインしました。',
            ];
            session()->set($ses_data);
            return redirect()->to('http://localhost:8080/home');
        } else {
            $data['validation'] = $this->validator;
            return view('auth/signup', $data);
        }
    }

    public function login()
    {
        return view('auth/login');
    }
    // ログイン(フォーム送信後)
    public function loginAuth()
    {
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $hashedPass = $user['password'];
            $authPassword = password_verify($password, $hashedPass);
            if ($authPassword) {
                $ses_data = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'created_at' => $user['created_at'],
                    'updated_at' => $user['updated_at'],
                    'isLoggedIn' => true,
                ];

                session()->set($ses_data);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('msg', 'パスワードが違います。');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('msg', '該当するメールアドレスがありません');
            return redirect()->to('/login');
        }
    }

    // ログイン後のホーム画面
    public function home()
    {
        return view('auth/home');
    }

}
