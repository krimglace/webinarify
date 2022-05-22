<?php

  $server = '0.0.0.0:3306';
  $user = 'root';
  $pass = 'root';
  $dbname = 'webinarify';
  
  $conn = mysqli_connect($server, $user, $pass, $dbname);
  if (!$conn) {
    die('error'.mysqli_error());
  }

?>