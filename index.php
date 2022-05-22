<?php 
  include('php/session-login.php');
  include('header.php');
?>
<style>
  h1.opening{
    font-size: 300%;
    margin-left: 17%;
    color: white;
  }
  .top-left, .top-right{
    float: left;
    width: 50%;;
  }
  .top-search{
    float: right;
    width: 60%;
    margin-right: 5%;
  }
  .kategori-item{
    float: left;
    width: 23%;
    margin: 0 1%;
    justify-content: center;
    align-items: center;
    position: relative;
    display: flex;
    padding: 0.5%;
    border-radius: 10px;
    box-shadow: 5px 5px 5px gray;
  }
  .kategori-item a{
    padding: 0.5%;
  }
  .trending{
    margin: 0 7.5%;
  }
  .event-webinar{
    margin: 1% 2% 3% 2%;
    padding: 2% 5%;
    border-radius: 15px;
    border: 0.5px solid gray;
    box-shadow: 5% 5% 5% gray;
    position: relative;
  }
</style>
    <div class="top-search">
      <i class="search text-white fas fa-search"></i>
      <input type="search" class="pencarian" placeholder="Cari Event Webinar" readonly="">
    </div>
    <div class="clearfix"></div>
    <div class="top-left">
      <h1 class="opening"><b>
        Hallo,<br>Generasi Muda <br>Indonesia
      </b></h1>
    </div>
    <div class="top-right">
      <img src="assets/img/beranda-picture1.png" alt="" width="100%">
    </div>
    <div class="clearfix"></div>
    <div class="beranda-content text-white container-fluid">
      <h3 class="ms-2">Kategori</h3>
      <div class="kategori">
        <?php
          while($resultKategori = mysqli_fetch_assoc($queryForm)){
        ?>
        <div class="kategori-item text-dark bg-white">
          <a onclick="haruslogin()" class="text-dark">
            <img src="assets/img/<?= $resultKategori['icon_kategoriwebinar'] ?>" width="100%" alt="" class="float-start col-2 me-2 mt-1">
            <h5 class="float-start col-9 mt-1">
              <?= $resultKategori['nama_kategoriwebinar'] ?>
            </h5>
            <div class="clearfix"></div>
          </a>
        </div>
        <?php } ?>
        <div class="clearfix m-2"></div>
        <a style="text-decoration:none" onclick="haruslogin()" class="float-end text-secondary me-4"><h4>Lihat Lainnya <i class="fas fa-angle-right"></i></h4></a>
        <div class="clearfix"></div>
      </div>
      <div class="event-trending text-dark">
        <h3 class="ms-2 mb-2">Event Trending <i class="text-danger fa-solid fa-fire-flame-curved"></i></h3>
        <div class="trending">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/slideberanda1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="assets/img/slideberanda1.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>

          </div>
        </div>
      </div>
      <div class="event-terdekat text-dark">
        <h3 class="ms-2 mb-2 mt-5">Event Terdekat</h3>
       <?php
          while($resultEvent = mysqli_fetch_assoc($queryForm2)){
            $tanggal = date('d M y', strtotime($resultEvent['tanggal_event']));
        ?>
        <div class="event-webinar text-dark bg-white">
          <img class="float-start col-3" src="assets/img/<?=$resultEvent['gambar_event']?>" alt="">
          <div class="float-start ms-5 col-8">
            <button onclick="haruslogin()" style="background-color: #CFC2FF; border: none; border-radius: 20px">
              <h5 class="pt-2 ps-2 pe-2 text-white">Webinar</h5>
            </button>
            <a class="text-primary mt-4" onclick="haruslogin()" style="text-decoration: none;">
              <h3>
                <?= $resultEvent['judul_event'] ?>
              </h3>
            </a>
            <div style="position: absolute; bottom: 15px">
              Event <b class="ms-5"><?= $tanggal ?></b>
            </div>
            <a style="position: absolute; bottom: 15px; right: 25px; background-color: #52A6BE; text-decoration:none; border-radius: 25px;" onclick="haruslogin()" class="text-white ps-3 pe-3">
              Detail Lainnya
            </a>
              <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
        <?php } ?>
        <a style="text-decoration:none" onclick="haruslogin()" class="float-end text-secondary me-4"><h4>Lihat Lainnya <i class="fas fa-angle-right"></i></h4></a>
        <div class="clearfix"></div>
        <br><br>
        <div class="text-center">
          <div id="testimoni" class=" carousel slide container pb-5 pt-2 ps-2 pe-2" style="border: 1px solid gray; border-radius: 25px" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#testimoni" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#testimoni" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#testimoni" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#testimoni" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <h3 style="color: #52A6BE">Testimoni</h3>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <?php
                while($resultTesti = mysqli_fetch_assoc($queryForm3)){
              ?>
              <div class="carousel-item">
                <h3 style="color: #52A6BE"><?= $resultTesti['nama_pentestimoni'] ?></h3>
                <?= $resultTesti['isi_testimoni'] ?>
              </div>
              <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimoni" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimoni" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
<?php include('footer.php'); ?>