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
    padding-left: 12.5%;
    padding-right: 12.5%;
  }
  i.icon-login{
    font-size: 150%;
    color: gray;
    position: absolute;
    margin-top: 3%;
    margin-left: 5%;
  }
</style>

<div class="masuk-form bg-white p-3 mt-3">
  <h3 class="text-center pt-4 pb-4">
    <strong>Masuk</strong>
  </h3>
  <form action="php/api-login.php" method="post" class="ps-3 ms-5 pe-3 me-5">
    <div class="form-cover">
      <i class="icon-login fas fa-user"></i>
      <input type="text" class="pt-2 mb-3 pb-2 form-login" placeholder="Email/Username" required="" name="user">
    </div>
    <div class="form-cover">
      <i class="icon-login fas fa-lock"></i>
      <input type="password" class="pt-2 pb-2 form-login" placeholder="Kata Sandi" required="" name="pass">
    </div>
    <div class="form-group mt-3">
      <button name="masuk" style="background-color:  #52A6BE; color: white; border: none; width: 100%; border-radius: 10px; font-size: 120%" class="pt-2 pb-2">Masuk</button>
    </div>
  </form>
  <div class="text-center mt-3 pb-5">
    Belum punya akun? <a style="text-decoration: none; color: #52A6BE" href="register.php">Daftar disini</a>
  </div>
</div>
<?php include('footer.php'); ?>