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
    <header>
        <h1>Coralis Studio</h1>
    </header>
    <?= form_open_multipart('register/process', 'class="form_container" ') ?>
    <?= csrf_field() ?>
    <header>
        <h1>Register</h1>
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
    <div class="input_box">
        <label for="name">Name</label>
        <div>
            <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
            <?php if (isset(session()->getFlashdata('errors')['name'])) : ?>
                <p style="color: red;"><?= session()->getFlashdata('errors')['name'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="input_box">
        <label for="password">Password</label>
        <div>
            <input type="password" name="password" id="password" required>
            <?php if (isset(session()->getFlashdata('errors')['password'])) : ?>
                <p style="color: red;"><?= session()->getFlashdata('errors')['password'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="input_box">
        <label for="profile_picture">Photo Profile</label>
        <div>
            <input type="file" name="profile_picture" id="profile_picture" value="<?= old('profile_picture') ?>" required>
            <?php if (isset(session()->getFlashdata('errors')['profile_picture'])) : ?>
                <p style="color: red;"><?= session()->getFlashdata('errors')['profile_picture'] ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="input_submit">
        <button class="button" type="submit">Register</button>
        <p>have a account? <a href="<?= site_url('/') ?>">login</a></p>
    </div>
    <?= form_close() ?>
</section>
<?= $this->endSection(); ?>