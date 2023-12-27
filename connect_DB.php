<?php
$serverName = "localhost";
$NameDB ="facebook";
$UserDB="root";
$Pass ="";
$connect =new mysqli($serverName, $UserDB, $Pass, $NameDB);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
?>