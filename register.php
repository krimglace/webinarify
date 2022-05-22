<?php 
  include('php/session-login.php');
  include('header.php');
?>
<style>
  .footer{
    position: absolute;
    bottom: 0;
    margin-bottom: -2px;
  }
  .masuk-form{
    width: 50%;
    margin-left: 25%;
    border-radius: 25px;
  }
  .form-login{
    width: 100%;
    font-size: 120%;
    border-radius: 10px;
    border: 1px solid gray;
  }
  .form-cover{
    position: relative;
  }
  input{
    padding-left: 10%;
    padding-right: 10%;
  }
</style>

<div class="masuk-form bg-white p-3 mt-3">
  <h3 class="text-center pt-4 pb-4">
    <strong>Daftar</strong>
  </h3>
  <form action="php/api-register.php" method="post" class="ps-3 ms-5 pe-3 me-5">
    <div class="form-cover">
      <input onkeyup="user();" id="username" name="username" type="text" class="pt-2 pb-2 form-login" placeholder="Username" required="">
<span id='pesan'></span>
    </div>
    <div class="form-cover mt-3">
      <input name="email" type="email" class="pt-2 mb-3 pb-2 form-login" placeholder="Email" required="">
    </div>
    <div class="form-cover">
      <input name="nama" type="text" class="pt-2 mb-3 pb-2 form-login" placeholder="Nama" required="">
    </div>
    <div class="form-cover">
      <input name="telepon" min="0" type="number" class="pt-2 mb-3 pb-2 form-login" placeholder="No. Hp" required="">
    </div>
    <div class="form-cover">
      <input name="password" onkeyup="check();" type="password" class="pt-2 pb-2 mb-3 form-login" placeholder="Kata Sandi" id="password" required="">
    </div>
    <div class="form-cover">
      <input name="passwordcheck" onkeyup="check();" type="password" class="pt-2 pb-2 form-login" placeholder="Ulangi Kata Sandi" id="confirm_password" required="">
<span id='message'></span>
    </div>
    <div class="form-group mt-3">
      <button name="daftar" style="background-color:  #52A6BE; color: white; border: none; width: 100%; border-radius: 10px; font-size: 120%" class="pt-2 pb-2" id="buttondaftar" disabled="">Daftar</button>
    </div>
  </form>
  <div class="text-center mt-3 pb-5">
    Sudah punya akun? <a style="text-decoration: none; color: #52A6BE" href="login.php">Masuk disini</a>
  </div>
</div>
<?php include('footer.php'); ?>
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.display = 'none';
    document.getElementById('buttondaftar').disabled = false;
  } else {
    document.getElementById('message').style.display = 'block';
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Kata Sandi tidak sama';
    document.getElementById('buttondaftar').disabled = true;
  }
}

var user = function(){
  var name = document.getElementById('username').value;
  
  if(!(/^\S{0,}$/.test(name))){
    document.getElementById('pesan').innerHTML = "Username Tidak Boleh Mengandung Spasi";
    document.getElementById('pesan').style.color = 'red';
    document.getElementById('pesan').style.display = 'block';
  } else{
    document.getElementById('pesan').style.display = 'none';
  }
  
}
</script>
