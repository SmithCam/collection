<?php 
  /*$servername = "162.241.24.74";
  $username = "camsmit1_cam";
  $password = "Braves05?123";
  $database = "camsmit1_site";*/

  $servername = "localhost:3307";
  $username = "root";
  $password = "braves05";
  $database = "site";


  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>