<?= $this->extend('/layouts/base'); ?>

<?= $this->section('content') ?>
<h2>ダッシュボード</h2>
<p>あなたの情報</p>
<article>
    <ul>
        <li>ID：<?= session()->get('id') ?></li>
        <li>名前：<?= session()->get('name') ?></li>
        <li>メールアドレス：<?= session()->get('email') ?></li>
        <li>アカウントの登録日時：<?= session()->get('created_at') ?></li>
        <li>アカウントの最終更新日：<?= session()->get('updated_at') ?></li>
    </ul>
    <a href="<?= base_url('logout') ?>" role="button">ログアウト</a>
</article>
<?= $this->endSection() ?>