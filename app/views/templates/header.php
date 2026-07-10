<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data["judul"]?></title> <!-- Judul tab browser diambil dinamis dari data controller -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/bootstrap.css"> <!-- Load Bootstrap CSS dari folder public/css -->
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>">PHP MVC</a> <!-- Logo/brand navbar menuju halaman utama -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- Ikon hamburger untuk tampilan mobile -->
            </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>">Home</a> <!-- Link navigasi ke halaman Home -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/mahasiswa">Mahasiswa</a> <!-- Link navigasi ke halaman daftar Mahasiswa -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/about">About</a> <!-- Link navigasi ke halaman About -->
                </li>
            </ul>
        </div>
    </div>
</nav>