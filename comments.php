<?php
require('connect_DB.php');
session_start();
var_dump($_POST);
$insertcomm = "insert into comments(content, post_id) values('" . $_POST['comment'] ."'," . $_POST['post_id'] . ")";
$insertquery = $connect->query($insertcomm);
header('Location:friendProfile.php');
