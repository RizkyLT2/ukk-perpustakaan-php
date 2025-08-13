<?php
    session_start();

    // Cek apakah pengguna sudah login
    $is_logged_in = isset($_SESSION['id_user']);

    // Jika belum login, arahkan ke halaman login
    if (!$is_logged_in) {
        header('Location: /auth/login.php');
        exit(); // Pastikan script berhenti dieksekusi setelah pengalihan
    }

    $currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projek PHP</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pengguna
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/users">List Pengguna</a></li>
            <li><a class="dropdown-item" href="/pages/users/create.php">Tambah Pengguna</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kursus
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/Kursus">List Kursus</a></li>
            <li><a class="dropdown-item" href="/pages/Kursus/create.php">Tambah Kursus</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Siswa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/siswa">List Siswa</a></li>
            <li><a class="dropdown-item" href="/pages/siswa/create.php">Tambah Siswa</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            pendaftaran
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/pendaftaran">List pendaftaran</a></li>
            <li><a class="dropdown-item" href="/pages/pendaftaran/create.php">Tambah pendaftaran</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex logout">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?=
            $_SESSION['username'];
          ?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/auth/logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Logout
          </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>