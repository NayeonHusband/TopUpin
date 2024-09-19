<?php 
require_once 'config.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online Saya</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="site-header">
        <div class="header-top">
            <div class="container">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i> (021) 1234-5678</span>
                    <span><i class="fas fa-envelope"></i> info@tokoonlinesaya.com</span>
                </div>
                <div class="user-actions">
                    <?php if (is_logged_in()): ?>
                        <a href="profile.php"><i class="fas fa-user"></i> Profil</a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    <?php else: ?>
                        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Masuk</a>
                        <a href="register.php"><i class="fas fa-user-plus"></i> Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="logo">
                    <a href="index.php">
                        <img src="assets/images/logo.png" alt="Toko Online Saya">
                    </a>
                </div>
                <div class="search-bar">
                    <form action="search.php" method="GET">
                        <input type="text" name="q" placeholder="Cari produk...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="cart-icon">
