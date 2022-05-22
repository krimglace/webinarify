<?php

  include('../php/session-user.php'); 
  include('header.php');
  
  $query = mysqli_query($conn, "SELECT * FROM event_webinar WHERE id_event = '".$_GET['id']."'" );
  
  $query2 = mysqli_query($conn, "SELECT * FROM daftar_webinar WHERE id_peserta = '".$_SESSION['id_user']."' AND id_event = '".$_GET['id']."'" );
  
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
    <div class="container-fluid mt-4">
      <div class="ms-4 mb-5"><strong><h3>Detail Partisipan</h3></strong></div>
      <div class="float-start me-5 col-2 ms-5">
        <img src="../assets/img/<?=$result['gambar_event']?>" alt="" width="100%">
      </div>
      <div class="float-start">
        <a class="text-primary mt-4" href="#" style="text-decoration: none;">
          <h2 class="pb-3">
            <b><?= $result['judul_event'] ?></b>
          </h2>
        </a>
        <h5>Jadwal : <b class="ms-5"><?= date('d M Y', strtotime($result['tanggal_event']))?></b></h5>
      </div>
      <div class="clearfix"></div>
      <hr color="secondary">
      <div class="form mt-3 ms-2 me-2">
        <?php
          if (mysqli_num_rows($query2) > 0) {
        ?>
        <form>
          <h4><label for="">Nama <b class="text-danger">*</b></label></h4>
          <input type="text" class="form-control" name="nama">
          
          <h4 class="mt-3"><label for="">Email <b class="text-danger">*</b></label></h4>
          <input type="email" class="form-control" name="email">
          
          <h4 class="mt-3"><label for="">Nomor Telepon <b class="text-danger">*</b></label></h4>
          <input type="number" min="0"class="form-control" name="telepon">
          
          <h4 class="mt-3"><label for="">Nomor Whatsapp <b class="text-danger">*</b></label></h4>
          <input type="number" min="0" class="form-control" name="wa">
          
          <h4 class="mt-3"><label for="">Pendidikan Saat Ini <b class="text-danger">*</b></label></h4>
          <input type="text" class="form-control mb-3" name="pendidikan">
          
          <span>
            Semua pemberitahuan akan dikirimkan melalui email yang kamu daftarkan dalam pembelian tiket
          </span>
          
          <div class="float-end mt-5">
            <a onclick="linkmati()" style="background-color: #52A6BE; text-decoration:none; " class="text-white btn">
                Simpan
            </a>
          </div>
          <div class="clearfix"></div>
        </form>
        <br>
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <div style="position: relative; justify-content: center; align-items: center; display: flex">
            <div class="text-center float-start col-3">
              <h4>TIKET EVENT</h4>
              <h5>Total Pembayaran</h5>
              <h6> 1 x Rp <?= number_format($result['harga'],2, ',','.') ?></h6>
            </div>
            <div class="float-end col-6 text-end">
              <h2>Rp <?= number_format($result['harga'],2, ',','.') ?></h2>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="text-end">
          <a href="pembayaran.php?id=<?=$result['id_event']?>$$<?=base64_encode(random_bytes(32))?>" style="background-color: #52A6BE; text-decoration:none; " class="text-white btn">
                Bayar
          </a>
        </div>
        <?php
          } else{
        ?>
        <form action="../php/api-insert.php" method="post">
          <h4><label for="">Nama <b class="text-danger">*</b></label></h4>
          <input type="text" class="form-control" name="nama" required="">
          
          <h4 class="mt-3"><label for="">Email <b class="text-danger">*</b></label></h4>
          <input type="email" class="form-control" name="email" required="">
          
          <h4 class="mt-3"><label for="">Nomor Telepon <b class="text-danger">*</b></label></h4>
          <input type="number" min="0"class="form-control" name="telepon" required="">
          
          <h4 class="mt-3"><label for="">Nomor Whatsapp <b class="text-danger">*</b></label></h4>
          <input type="number" min="0" class="form-control" name="wa" required="">
          
          <h4 class="mt-3"><label for="">Pendidikan Saat Ini <b class="text-danger">*</b></label></h4>
          <input type="text" class="form-control mb-3" name="pendidikan" required="">
          <input type="hidden" name="harga" value="<?=$result['harga']?>">
          <input type="hidden" name="id_event" value="<?=$result['id_event']?>">
          <span>
            Semua pemberitahuan akan dikirimkan melalui email yang kamu daftarkan dalam pembelian tiket
          </span>
          
          <div class="float-end mt-5">
            <button name="detail" style="background-color: #52A6BE; text-decoration:none; " class="text-white btn">
                Simpan
            </button>
          </div>
          <div class="clearfix"></div>
        </form>
        <br>
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <div style="position: relative; justify-content: center; align-items: center; display: flex">
            <div class="text-center float-start col-3">
              <h4>TIKET EVENT</h4>
              <h5>Total Pembayaran</h5>
              <h6> 1 x Rp <?= number_format($result['harga'],2, ',','.') ?></h6>
            </div>
            <div class="float-end col-6 text-end">
              <h2>Rp <?= number_format($result['harga'],2, ',','.') ?></h2>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="text-end">
          <button onclick="belumselesai()" style="background-color: #52A6BE; text-decoration:none; " class="text-white btn">
                Bayar
          </button>
        </div>
        <?php } ?>
      </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    
      function belumselesai(){
        swal({
          title: "Gagal Memuat Halaman",
          text: "Simpan Data Anda Terlebih Dahulu!",
          icon: "error"
        });
      }
      function linkmati(){
        swal({
          title: "Gagal Memuat Halaman",
          text: "Anda Telah Mendaftar Pada Event Ini!",
          icon: "error"
        });
      }
    </script>
<?php include('footer.php'); ?>