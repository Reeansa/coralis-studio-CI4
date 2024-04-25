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
        <h1>Profile Pages</h1>
    </header>
    <div class="form_container">
        <div class="profile">
            <h2>Welcome <?= session()->get('name') ?></h2>
            <p>Email: <?= session()->get('email') ?></p>
            <img src="<?= base_url('assets/images/profile/' . session()->get('profile_picture')) ?>" width="200" height="200" alt="<?= session()->get('name') ?>">
            <a class="button" href="<?= site_url('/logout'); ?>">Logout</a>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>