<?= $this->extend('/layouts/base'); ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('msg')): ?>
    <p><mark><?= session()->getFlashdata('msg') ?></mark></p>
<?php endif; ?>

<?php $validation = \Config\Services::validation(); ?>

<article>
    <form action="AuthController/save_account" method="post">
        <h2>アカウント登録</h2>

        <?php if (isset($validation)): ?>
            <div><?= $validation->listErrors() ?></div>
        <?php endif; ?>

        <label for="name">お名前</label>
        <input type="text" name="name" value="<?= set_value('name') ?>">

        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="<?= set_value('email') ?>">

        <label for="password">パスワード</label>
        <input type="password" name="password" value="<?= set_value('password') ?>">

        <input type="submit" name="submit" value="サインアップ">
    </form>
</article>
<?= $this->endSection() ?>