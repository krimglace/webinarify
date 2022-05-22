<?php

  include('../php/session-user.php'); 
  include('header.php');
  
  $query = mysqli_query($conn, "SELECT * FROM event_webinar WHERE id_kategoriwebinar = '".$_GET['id']."' ORDER BY tanggal_event DESC" );
?>
<style>
  .top-search{
    float: right;
    width: 60%;
    margin-right: 5%;
    text-align: right;
  }
</style>
    <div class="top-search text-right">
      <i class="search text-white fas fa-search"></i>
      <input type="search" class="text-dark pencarian" placeholder="Cari Event Webinar" >
      <br><br>
      <div class="text-right me-4">
        <h2>
          <img src="../assets/img/tangan.svg" class="me-2">
          <b>Hi, <?= $resUser['nama_user'] ?> !</b>
        </h2>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid">
      <h3><strong>Kategori <i class="fas fa-angle-right"></i> <?=$_GET['kategori']?></strong></h3>
      <br>
<?php
  while($result = mysqli_fetch_assoc($query)){
?>
      <div class="p-3 me-5 ms-5 mb-4 bg-white" style="border: 1px solid black; border-radius: 25px">
        <img class="float-start col-3" src="../assets/img/<?=$result['gambar_event']?>" alt="">
        <div class="float-start ms-5 col-8">
          <button class="mb-3" disabled style="background-color: #CFC2FF; border: none; border-radius: 20px">
            <h5 class="pt-2 ps-2 pe-2 text-white">Webinar</h5>
          </button>
          <a class="text-primary mt-4" href="detail-event.php?id=<?=$result['id_event']?>&&<?=base64_encode(random_bytes(32))?>" style="text-decoration: none;">
            <h3>
              <?= $result['judul_event'] ?>
            </h3>
          </a>
          <div class="float-start">
            <div style="margin-top: 10%">
              Event <b class="ms-5"><?= date('d M Y', strtotime($result['tanggal_event'])) ?></b>
              </div>
            <div>
              Daftar <b class="ms-5"><?= date('d M Y', strtotime($result['akhir_pendaftaran'])) ?></b>
              </div>
            </div>
            <a style="float: right; margin-right: 25px; background-color: #52A6BE; text-decoration:none; border-radius: 25px; margin-top: 5%" href="detail-event.php?id=<?=$result['id_event']?>&&<?=base64_encode(random_bytes(32))?>" class="text-white ps-3 pe-3">
            Detail Lainnya
          </a>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
<?php
  }
?>

    </div>
<?php include('footer.php'); ?>