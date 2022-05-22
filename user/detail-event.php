<?php

  include('../php/session-user.php'); 
  include('header.php');
  
  $query = mysqli_query($conn, "SELECT * FROM event_webinar WHERE id_event = '".$_GET['id']."'");
  $result = mysqli_fetch_assoc($query);
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
    <br><br>
    <div class="content-top container-fluid">
      <div class="float-start col-6">
        <img src="../assets/img/<?=$result['gambar_event']?>" alt="" width="95%">
      </div>
      <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="float-start col-6 p-3 bg-white">
        <h4><strong>Tentang Event</strong></h4>
        <?= $result['deskripsi'] ?>
        <h4><strong>Manfaat</strong></h4>
        <?= $result['manfaat'] ?>
        <h4><strong>Prasyarat</strong></h4>
        <ul>
          <li><?= $result['prasyarat'] ?></li>
        </ul>
      </div>
      <div class="clearfix"></div>
      <br><br>
      <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="p-5 bg-white mb-4">
        <button disabled="" style="background-color: #CFC2FF; border: none; border-radius: 20px" class="mb-3">
          <h5 class="pt-2 ps-2 pe-2 text-white">Webinar</h5>
        </button>
        <a class="text-primary mt-4" href="#" style="text-decoration: none;">
          <h3 style="border-bottom: 1px solid gray" class="pb-3 mb-2">
            <b><?= $result['judul_event'] ?></b>
          </h3>
        </a>
        <div class="pb-3 mb-2" style="border-bottom: 1px solid gray">
          <div class="float-start col-1">
            <img src="../assets/img/kalender.png" alt="" width="50%">
          </div>
          <div class="float-start col-4 mt-2">
            <b><?= date('d M Y', strtotime($result['tanggal_event'])) ?></b>
          </div>
          <div class="float-end mt-2 text-end">
            <b><?= date('H:i', strtotime($result['waktu'])) ?> WIB</b>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="pb-3 mb-2" style="border-bottom: 1px solid gray">
          <div class="float-start col-1">
            <img src="../assets/img/lokasi.png" alt="" width="50%">
          </div>
          <div class="float-start col-4 mt-2">
            <b><?= $result['pelaksanaan']?></b>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="pb-3" style="border-bottom: 1px solid gray">
          <div class="float-start col-1">
            <img src="../assets/img/profil (1).png" alt="" width="50%">
          </div>
          <div class="float-start col-4 mt-2">
            <b><?= $result['email']?></b>
          </div>
          <div class="float-end mt-2 text-end">
            <b>
              <i style="font-size: 200%" class="me-1 fab fa-instagram"></i> <i style="font-size: 200%" class="fab fa-whatsapp"></i>
            </b>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="ps-5 pe-5 pt-4 pb-4 bg-white">
        <div class="float-start col-1">
          <img src="../assets/img/simpan.png" alt="" width="50%">
        </div>
        <div class="float-start col-1 me-3">
          <img src="../assets/img/bagikan.png" alt="" width="50%">
        </div>
        <div class="float-end">
          <a style="background-color: #52A6BE; text-decoration:none; " href="detail-pendaftar.php?id=<?= $result['id_event'] ?>&&<?= base64_encode(random_bytes(32)) ?>" class="text-white btn">
              Pilih Webinar
            </a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
<?php include('footer.php'); ?>