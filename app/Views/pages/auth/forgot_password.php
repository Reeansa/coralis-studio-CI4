<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div id="flash" class="alert_success">
        <p><?= session()->getFlashdata('success') ?></p>
    </div>
<?php elseif (session()->getFlashdata('error')) : ?>
    <div id="flash" class="alert_error">
        <p><?= session()->getFlashdata('error') ?></p>
    </div>
<?php endif; ?>
<section>
    <header style="display: flex; gap: 20px;">
        <a href="<?= site_url('/') ?>">🔙</a>
        <h1>Coralis Studio</h1>
    </header>
    <?= form_open('send-token', 'class="form_container"') ?>
    <?= csrf_field() ?>
    <header>
        <h1>Send Email</h1>
    </header>
    <div class="input_box">
        <label for="email">Email</label>
        <div>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            <?php if (isset(session()->getFlashdata('errors')['email'])) : ?>
                <p style="color: red;"><?= session()->getFlashdata('errors')['email'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="input_submit">
        <button class="button" type="submit">Send Email</button>
        <p>dont have a account? <a href="<?= site_url('register') ?>">register</a></p>
    </div>
    <?= form_close() ?>
</section>
<?= $this->endSection(); ?>