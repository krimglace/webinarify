<?php

  session_start();
  
  include('config.php');

?>
<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if (isset($_SESSION['id_user'])) {
    echo('
      <script>
        window.location.href = "user/index.php?'.base64_encode(random_bytes(32)).'"
      </script>
    ');
  }
?>
</body>