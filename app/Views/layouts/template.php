<!DOCTYPE html>
<html lang="en">
<?= $this->include('layouts/head'); ?>

<body>
    <main>
        <?= $this->renderSection('content'); ?>
    </main>

    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>