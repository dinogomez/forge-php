<?php

session_start();


  $server = "127.0.0.1";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "forge";

  $conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

  if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
  }




 ?>