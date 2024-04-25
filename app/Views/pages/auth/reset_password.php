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
    <?= form_open('reset-password/process', 'class="form_container"') ?>
    <?= csrf_field() ?>
    <header>
        <h1>Reset Password</h1>
    </header>
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="input_box">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div class="input_box">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
    </div>
    <div class="input_submit">
        <button class="button" type="submit">Reset Password</button>
        <p>dont have a account? <a href="<?= site_url('register') ?>">register</a></p>
    </div>
    <?= form_close() ?>
</section>
<?= $this->endSection(); ?>