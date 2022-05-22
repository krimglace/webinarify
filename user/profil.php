<?php

  include('../php/session-user.php'); 
  include('header.php');
  
?>
<style>
  .top-search{
    float: right;
    width: 60%;
    margin-right: 5%;
    text-align: right;
  }
  .circle-1{
    background-color: #D4D4D4;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    z-index: 100000;
    position: absolute;
  }
  .box-1{
    background-color: #CFC2FF;
    margin-top: 100px;
    width: 150px;
    height: 150px;
    
    margin-left: 100px;
    z-index: -1;
  }
  .username{
    background-color: #D4D4D4;
    border-radius: 10px;
  }
  .mid-content{
    border-radius: 50px;
    border: 2px solid #52A6BE;
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
    <div class="top-content ms-5 me-5">
      <div class="left-top float-start col-4">
        <div class="circle-1"></div>
        <div class="box-1"></div>
        <br>
        <div class="username text-center p-2">
          <b style="color: blue">
            @<?= $resUser['username'] ?>
          </b>
        </div>
        <br>
        <div class="text-center">
          <h5 class="mb-3">
            <a class="text-warning" style="text-decoration: none" href="edit-profil.php?<?=base64_encode(random_bytes(32))?>">Edit Profil</a>
          </h5>
          <h5>
            <a style="color: blue; text-decoration: none" href="../php/session-logout.php">
              Keluar dari akun mu
            </a>
          </h5>
        </div>
      </div>
      <div class="right-top mt-3 float-end col-6">
        <input style="background-color: #D4D4D4; width: 100%; border: none; border-radius:10px; font-size: 120%; box-shadow: 5px 5px 10px gray" type="text" readonly="" value="<?= $resUser['nama_user'] ?>" class="mb-2 pt-2 pb-2 pe-4 ps-4">
        <input style="background-color: #D4D4D4; width: 100%; border: none; border-radius:10px; font-size: 120%; box-shadow: 5px 5px 10px gray" type="text" readonly="" value="<?= $resUser['jeniskelamin_user'] ?>" class="mb-2 pt-2 pb-2 pe-4 ps-4">
        <input style="background-color: #D4D4D4; width: 100%; border: none; border-radius:10px; font-size: 120%; box-shadow: 5px 5px 10px gray" type="text" readonly="" value="<?= $resUser['telepon'] ?>" class="mb-2 pt-2 pb-2 pe-4 ps-4">
        <input style="background-color: #D4D4D4; width: 100%; border: none; border-radius:10px; font-size: 120%; box-shadow: 5px 5px 10px gray" type="text" readonly="" value="<?= $resUser['email_user'] ?>" class="mb-2 pt-2 pb-2 pe-4 ps-4">
        <input style="background-color: #D4D4D4; width: 100%; border: none; border-radius:10px; font-size: 120%; box-shadow: 5px 5px 10px gray" type="text" readonly="" value="<?= $resUser['pekerjaan_user'] ?>" class="mb-2 pt-2 pb-2 pe-4 ps-4">
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="mid-content p-4 ms-5 me-5 mt-5">
      <h3>Event-ku</h3>
      <br>
      <div class="float-start col-6">
        <a href="" style="text-decoration: none; border-radius: 15px; background-color:#D4D4D4" class="text-dark float-end col-8 me-5 text-center pt-5 pb-5 ps-2 pe-2">
          <h5>Dalam Pendaftaran</h5>
          <i style="font-size:300%" class="fas fa-check-to-slot"></i>
        </a>
        <div class="clearfix"></div>
      </div>
      <div class="float-start col-6">
        <a href="" style="text-decoration: none; border-radius: 15px; background-color:#CFC2FF" class="text-dark float-start col-8 ms-5 text-center pt-5 pb-5 ps-2 pe-2">
          <h5>Sertifikat</h5>
          <i style="font-size:300%" class="fas fa-medal"></i>
        </a>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="ms-5 me-5">
      <div class="mid-content p-4 ms-5 me-5 mt-5">
        <h3 class="float-start col-6 pt-4">
          <b>Pasang dan Publikasikan Eventmu !</b>
        </h3>
        <div class="clearfix"></div>
        <h5 class="pb-5">Upload event organisasi anda di Webinarify agar dapat dilihat dan dipublikasikan secara luas di seluruh Indonesia</h5>
      </div>
    </div>
    <div class="me-5 ms-5">
      <div style="background-color: #CFC2FF; border-radius: 15px" class="ms-5 me-5 mt-4 text-center pt-3 pb-2">
        <h5>
          <a class="text-dark" href="pasang-event.php?<?= base64_encode(random_bytes(32)) ?>" style="text-decoration: none">Pasang Event Sekarang !</a>
        </h5>
      </div>
    </div>
    
    <?php include('footer.php'); ?>