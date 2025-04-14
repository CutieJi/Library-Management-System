
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getenv('APP_NAME') . ' - ' . $title; ?></title>

    <!-- Assets -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/compiled/css/auth.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/extensions/sweetalert2/sweetalert2.min.css">

    <!-- Simple Datatable -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/compiled/css/table-datatable.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- Dripicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/extensions/@icon/dripicons/dripicons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist//assets/compiled/css/ui-icons-dripicons.css">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/mazer/dist/assets/extensions/flatpickr/flatpickr.min.css">

    <script src="<?= base_url(); ?>template/mazer/dist/assets/static/js/initTheme.js"></script>
</head>

<body>
    <div id="app">