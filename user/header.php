<?php

  include '../php/config.php';
  
  $queryCategory = "SELECT * FROM kategori_webinar ORDER BY id_kategoriwebinar ASC LIMIT 4";
  $queryForm = mysqli_query($conn, $queryCategory);
  
  $queryEvent = "SELECT * FROM event_webinar ORDER BY tanggal_event DESC LIMIT 2";
  $queryForm2 = mysqli_query($conn, $queryEvent);
  
  $queryTesti = "SELECT * FROM testimoni_event ORDER BY id_testimoni ASC LIMIT 3";
  $queryForm3 = mysqli_query($conn, $queryTesti);
  
  $queryUser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$_SESSION['id_user']."'");
  $resUser = mysqli_fetch_assoc($queryUser);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <title>Webinarify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      *{
      font-family: roboto;
    }
      nav.navbar-menu{
        margin-top: 4%;
      }
      ul.menu-cover li.menu-content{
        display: inline-block;
        margin: 2% 2.5%;
      }
      li.login-tab a{
        padding: 15% 30%;
        border-radius: 25px;
      }
      li.menu-content a{
        text-decoration: none;
        font-size: 150%;
        color: white;
      }
      .top-top-menu{
        margin-right: 5%;
      }
      ul.hubungi-kami li{
        display: block;
      }
    
    .pencarian{
      background-color: white;
      border-radius: 25px;
      width: 100%;
      opacity: 0.5;
      padding: 1% 7.5%;
      color: white;
      font-size: 125%;
    }
    .search{
      font-size: 125%;
      position: absolute;
      margin-top: 1%;
      margin-left: 1.5%;
    }
    </style>
  </head>
  <body style="background-image: url('../assets/img/latar2.png')">
    <nav class="navbar-menu container-fluid">
      <div class="float-start col-4 mt-4">
        <img src="../assets/img/logo.png" alt="" width="100%">
      </div>
      <div class="top-top-menu float-end col-7 text-end">
        <div class="top-menu">
          <ul class="menu-cover text-white">
            <li class="menu-content"><a href="index.php">Beranda</a></li>
            <li class="menu-content"><a href="#">Kontak Kami</a></li>
            <li style="font-size: 75%" class="menu-content login-tab"><a href="profil.php?<?= base64_encode(random_bytes(32)); ?>" class="bg-secondary"><?= $resUser['username'] ?></a></li>
          </ul>
        </div>
      </div>
      <div class="clearfix"></div>
    </nav>