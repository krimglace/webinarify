<?php

  include('../php/session-user.php'); 
  include('header.php');
  echo($_SESSION['id_user']);
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
    margin-top: -100px;
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
  .top-content{
    margin: 0 35%;
  }
  .username{
    background-color: #D4D4D4;
    border-radius: 10px;
  }
  input.content{
    background-color: white;
    opacity: 0.5;
    border: none;
    border-radius: 15px;
    font-size: 120%;
    width: 100%;
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
    <div class="top-content text-center">
      <div class="circle-1"></div>
      <div class="box-1"></div>
      <br>
      <div class="username text-center p-2">
        <b style="color: blue">
            @<?= $resUser['username'] ?>
          </b>
      </div>
      <br>
    </div>
    <form method="post" action="../php/api-update.php">
      <div class="p-5" style="background-color:#CFC2FF; border-radius: 35px; margin: 0 20%">
        <input required type="text" class="content mb-2 p-3" name="username" value="<?= $resUser['username'] ?>" placeholder="Username">
        <input required type="text" class="content mb-2 p-3" name="nama" value="<?= $resUser['nama_user'] ?>" placeholder="Nama">
        <input required type="number" class="content mb-2 p-3" name="telepon" value="<?= $resUser['telepon'] ?>" placeholder="No. Handphone">
        <input required type="email" class="content mb-2 p-3" name="email" value="<?= $resUser['email_user'] ?>" placeholder="Email">
        <input type="text" class="content mb-2 p-3" name="pekerjaan" value="<?= $resUser['pekerjaan_user'] ?>" placeholder="Pekerjaan">
        <input type="text" class="content mb-2 p-3" name="jenis" value="<?= $resUser['jeniskelamin_user'] ?>" placeholder="Jenis Kelamin">
        <input id="password" onkeyup="last();" type="hidden" value="<?= $resUser['password'] ?>">
        <input id="lastpassword" onkeyup="last();" type="password" class="content p-3" name="lastpassword" placeholder="Password Lama">
        <span id="last"></span>
        <input onkeyup="last();" id="newpassword" type="password" class="content mb-2 mt-2 p-3" name="newpassword" placeholder="Password Baru" style="display: none">
        <input style="display: none" onkeyup="last();" id="confirmpassword" type="password" class="content p-3" name="confirmpassword" placeholder="Konfirmasi Password">
        <span id="confirmasi"></span>
        <button id="ganti" name="ganti" style="border: none; border-radius: 15px; background-color: white; opacity: 0.8" class="float-end pt-2 mt-2 pb-2 ps-4 pe-4">Simpan Perubahan</button>
        <div class="clearfix"></div>
      </div>
    </form>
        <br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.11.1/js/md5.min.js"></script>
    <script>
      var last = function(){
        var lastpas = document.getElementById('lastpassword').value;
        var pasdata = document.getElementById('password').value;
        var newpas = document.getElementById('newpassword').value;
        var conpas = document.getElementById('confirmpassword').value;
        
        if(lastpas == ''){
          document.getElementById('last').style.display = 'none';
          document.getElementById('ganti').disabled = false;
          document.getElementById('confirmpassword').style.display = 'none';
          document.getElementById('newpassword').style.display = 'none';
        }else if( md5(lastpas) != pasdata){
          document.getElementById('last').style.display = 'block';
          document.getElementById('last').style.color = 'red';
          document.getElementById('last').innerHTML = 'Password anda sebelumnya salah';
          document.getElementById('ganti').disabled = true;
          document.getElementById('confirmpassword').style.display = 'none';
          document.getElementById('newpassword').style.display = 'none';
        } else{
          document.getElementById('last').style.display = 'none';
          document.getElementById('confirmpassword').style.display = 'block';
          document.getElementById('ganti').disabled = false;
          document.getElementById('newpassword').style.display = 'block';
        }
        
        if(newpas == '' && conpas == ''){
          document.getElementById('confirmasi').style.display = 'none';
          document.getElementById('ganti').disabled = false;
        }else if( newpas != conpas){
          document.getElementById('confirmasi').style.display = 'block';
          document.getElementById('confirmasi').style.color = 'red';
          document.getElementById('confirmasi').innerHTML = 'Password tidak sama';
          document.getElementById('ganti').disabled = true;
        } else{
          document.getElementById('confirmasi').style.display = 'none';
          document.getElementById('ganti').disabled = false;
        }
      }
      
    </script>
<?php include('footer.php'); ?>