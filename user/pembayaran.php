<?php

  include('../php/session-user.php'); 
  include('header.php');
  
  $query = mysqli_query($conn, "SELECT * FROM event_webinar WHERE id_event = '".$_GET['id']."'" );
  
  $query2 = mysqli_query($conn, "SELECT * FROM daftar_webinar WHERE id_peserta = '".$_SESSION['id_user']."' AND id_event = '".$_GET['id']."'" );
  
  $result = mysqli_fetch_assoc($query);
  $result2 = mysqli_fetch_assoc($query2);
?>

<style>
  .top-search{
    float: right;
    width: 60%;
    margin-right: 5%;
    text-align: right;
  }
</style>
    <?php if($result2['status'] == 'Belum Bayar') { ?>
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
      </div>
      <div class="container-fluid">
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <h3 class="mb-5"><strong>Pembayaran</strong></h3>
          <div class="float-start">
            <h4>Harga</h4>
            <h4>Diskon</h4>
            <h4>Jumlah yang harus dibayar</h4>
          </div>
          <div class="float-end col-3">
            <h4>Rp <?=number_format($result['harga'],2,',','.')?></h4>
            <h4>Rp 0</h4>
            <h4>Rp <?=number_format($result['harga'],2,',','.')?></h4>
          </div>
          <div class="clearfix"></div>
        </div>
        <br>
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <h3 class="mb-3"><strong>Pembayaran Online</strong></h3>
          <div>
            <label for="bni">
            <h3><input name="bank" id="bni" class="bni" type="radio" onclick="cekcek()"> <img src="../assets/img/bni.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="bninomor">123456789</h3>
            <label for="bca">
            <h3><input name="bank" id="bca" class="bca" type="radio" onclick="cekcek()"> <img src="../assets/img/bca.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="bcanomor">123456789</h3>
            <label for="gopay">
            <h3><input name="bank" id="gopay" class="gopay" type="radio" onclick="cekcek()"> <img src="../assets/img/gopay.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="gopaynomor">123456789</h3>
            <label for="dana">
            <h3><input name="bank" id="dana" class="dana" type="radio" onclick="cekcek()"> <img src="../assets/img/dana.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="dananomor">123456789</h3>
            <label for="shopepay">
            <h3><input name="bank" id="shopepay" class="shopepay" type="radio" onclick="cekcek()"> <img src="../assets/img/shopepay.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="shopepaynomor">123456789</h3>
          </div>
        </div>
        <div class="text-end">
          <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #52A6BE; text-decoration:none; " class="text-white btn">
                Konfirmasi
          </button>
        </div>
     </div>
      <div class="mo     </dal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Konfirmasi Pembayaran</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../php/api-update.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input name="idpen" type="hidden" value="<?=$result2['id_pendaftaran']?>">
                <input type="hidden" name="idev" value="<?=$result2['id_event']?>">
                Upload Bukti Pembayaran Anda
                <br><br>
                <input type="file" name="bukti" class="form-control" required="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button name="buktibayar" type="submit" class="btn btn-primary">Upload</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php }elseif($result2['status'] == 'Menunggu Konfirmasi') { ?>
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
      </div>
      <div class="container-fluid">
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <h3 class="mb-5"><strong>Pembayaran</strong></h3>
          <div class="float-start">
            <h4>Harga</h4>
            <h4>Diskon</h4>
            <h4>Jumlah yang harus dibayar</h4>
          </div>
          <div class="float-end col-3">
            <h4>Rp <?=number_format($result['harga'],2,',','.')?></h4>
            <h4>Rp 0</h4>
            <h4>Rp <?=number_format($result['harga'],2,',','.')?></h4>
          </div>
          <div class="clearfix"></div>
        </div>
        <br>
        <div style=" border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ps-5 pe-5 pt-4 pb-4 bg-white">
          <h3 class="mb-3"><strong>Pembayaran Online</strong></h3>
          <div>
            <label for="bni">
            <h3><input name="bank" id="bni" class="bni" type="radio" onclick="cekcek()"> <img src="../assets/img/bni.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="bninomor">123456789</h3>
            <label for="bca">
            <h3><input name="bank" id="bca" class="bca" type="radio" onclick="cekcek()"> <img src="../assets/img/bca.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="bcanomor">123456789</h3>
            <label for="gopay">
            <h3><input name="bank" id="gopay" class="gopay" type="radio" onclick="cekcek()"> <img src="../assets/img/gopay.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="gopaynomor">123456789</h3>
            <label for="dana">
            <h3><input name="bank" id="dana" class="dana" type="radio" onclick="cekcek()"> <img src="../assets/img/dana.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="dananomor">123456789</h3>
            <label for="shopepay">
            <h3><input name="bank" id="shopepay" class="shopepay" type="radio" onclick="cekcek()"> <img src="../assets/img/shopepay.png" width="75%" alt=""></h3>
            </label>
            <br>
            <h3 style="display: none" id="shopepaynomor">123456789</h3>
          </div>
        </div>
        <div class="text-end">
          <button disabled="" style=" text-decoration:none; " class="btn btn-warning">
                Menunggu Konfirmasi...
          </button>
        </div>
     </div>
    <?php } else{ ?>
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
        <div class="text-center">
          <img src="../assets/img/transaksi.png" alt="" width="15%">
          <br><br>
          <h3 style="color: blue"><strong>Transaksi Sukses</strong></h3>
        </div>
        <br>
        <div class="float-start col-6">
          <div style="border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 me-2 ps-5 pe-5 pt-4 pb-4 bg-white">
            <h3><strong>Detail Transaksi</strong></h3>
            <div class="float-start col-6">
              <h6>Tanggal dan Waktu</h6>
              <h6>Nomor Transaksi</h6>
              <h6>Total Pembayaran</h6>
            </div>
            <div class="float-start col-6">
              <h6><?=date('d M Y,  H:i', strtotime($result2['tanggal']))?> WIB</h6>
              <h6><?=base64_encode($result2['id_pendaftaran']).base64_encode($resUser['username'])?></h6>
              <h6>Rp <?=number_format($result2['harga'],2,',','.')?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="float-start col-6">
          <div style="border-radius: 25px; box-shadow: 5px 5px 5px black" class="mb-4 ms-2 ps-5 pe-5 pt-4 pb-4 bg-white">
            <h3><strong>Langkah Setelah Mendaftar</strong></h3>
            
            <table>
              <tr>
                <td>1. </td>
                <td>Ikuti grup whatsapp melalui <a href="#" style="text-decoration:none">https://chat.whatsapp.com/082618819</a></td>
              </tr>
              <tr>
                <td class="p-1 me-3">2. </td>
                <td>Isi form masukan untuk mendapatkan sertifikat</td>
              </tr>
              <tr>
                <td class="p-1 me-3">3. </td>
                <td>Dapatkan Sertifikat/td>
              </tr>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="text-center">
          <a href="index.php<?base64_encode(random_bytes(32))?>" style="background-color: #52A6BE; text-decoration:none; width: 75% " class="text-white btn">
                Lihat Event
          </a>
        </div>
      </div>
    <?php } ?>
    <script>
      function cekcek(){
        if(document.getElementById('bni').checked){
          document.getElementById('bninomor').style.display = 'block';
        } else {
          document.getElementById('bninomor').style.display = 'none';
        }
        if(document.getElementById('bca').checked){
          document.getElementById('bcanomor').style.display = 'block';
        } else {
          document.getElementById('bcanomor').style.display = 'none';
        }
        if(document.getElementById('gopay').checked){
          document.getElementById('gopaynomor').style.display = 'block';
        } else {
          document.getElementById('gopaynomor').style.display = 'none';
        }
        if(document.getElementById('dana').checked){
          document.getElementById('dananomor').style.display = 'block';
        } else {
          document.getElementById('dananomor').style.display = 'none';
        }
        if(document.getElementById('shopepay').checked){
          document.getElementById('shopepaynomor').style.display = 'block';
        } else {
          document.getElementById('shopepaynomor').style.display = 'none';
        }
      }
    </script>
<?php include('footer.php'); ?>