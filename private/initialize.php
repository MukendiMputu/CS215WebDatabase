<?php

   //require_once('db_credentials.php');

    define("DB_SERVER", "localhost");
    define("DB_USER", "mmx458");
    define("DB_PASS", "r!Wy0Za7");
    define("DB_NAME", "mmx458");

   $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

   if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
   }


?>
