<?php
session_start();
include 'lib/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Manyasuaw - Tempat Jual Beli Boxer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Minishop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="catalog.php" class="nav-link">Catalog</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <?php
          if (empty($_SESSION['username'])) {
          ?>
            <li class="nav-item"><a href="login/index.php" class="nav-link">Login</a></li>
          <?php
          } else {
          ?>
            <li class="nav-item"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
            <!-- <li class="nav-item"><a href="login/logout.php" class="nav-link">Log Out From </a></li> -->
            <li class="dropdown nav-item">
              <div class="dropdown-toggle nav-link" data-toggle="dropdown">
                <?= $_SESSION['username'] ?>
              </div>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="google.com">profile</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="login/logout.php">Logout</a>
              </div>
            </li>


          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>