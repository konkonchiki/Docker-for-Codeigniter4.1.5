<?= $this->extend('/layouts/base'); ?>

<?= $this->section('content') ?>
<article>
    <form action="/AuthControlle/login" method="post">
        <h2>ログイン</h2>

        <?php if (session()->getFlashdata('msg')): ?>
            <p><mark><?= session()->getFlashdata('msg') ?></mark></p>
        <?php endif; ?>

        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="<?= set_value('email') ?>">

        <label for="password">パスワード</label>
        <input type="password" name="password" value="<?= set_value('password') ?>">

        <input type="submit" name="submit" value="ログイン">
    </form>
</article>
<?= $this->endSection() ?>