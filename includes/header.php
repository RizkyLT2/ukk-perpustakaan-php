<?php
    session_start();

    // Cek apakah pengguna sudah login
    $is_logged_in = isset($_SESSION['user_id']);

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
            Buku
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/books">List Buku</a></li>
            <li><a class="dropdown-item" href="/pages/books/create.php">Tambah Buku</a></li>
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
            Peminjam
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/pages/peminjam">List Peminjam</a></li>
            <li><a class="dropdown-item" href="/pages/peminjam/create.php">Tambah Peminjam</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex logout">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?=
            $_SESSION['nama'];
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