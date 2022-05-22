<?php

  session_start();
  
  include('config.php');

?>
<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if (!isset($_SESSION['id_user'])) {
    echo('        
      <script>
          swal({
            title: "Gagal Memuat Halaman",
            text: "Silahkan login terlebih dahulu !",
            icon: "error"
          }).then(function(){
            window.location.href="../login.php";
          });
      </script>
    ');
  }
?>
</body>