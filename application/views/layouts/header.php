<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/Firstfear-Whistlepuff-Chrome.ico') ?>" type="image/png">
    <title>Proses Lamaran</title>

    <!-- Load library bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-custom.css') ?>">

    <!-- Load library fontawesome css -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <!-- Load library jquery ui css -->
    <link rel="stylesheet" href="<?= base_url('assets/jquery-ui/jquery-ui.min.css') ?>">

</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item <?= active_link('proses') ?>" id="tulisan_navbar">
                    <a class="nav-link" href="<?= base_url('proses'); ?>">Proses Lamaran <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= active_link('tertunda') ?>" id="tulisan_navbar">
                    <a class="nav-link" href="<?= base_url('tertunda'); ?>">Lamaran Tertunda</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
