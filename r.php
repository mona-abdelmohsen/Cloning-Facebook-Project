<?php
require('connect_DB.php');
session_start();
if($_POST){
$user_id=$_POST['user_id'];
$res_id=$_POST['res_id'];
$sql="insert into friend_requests (user_id,res_id,state)values('".$user_id."','".$res_id."', 0 )";

$req=$connect->query($sql);

// $sql2 = 'select username from users where user_ID='. $res_id. "'";
// $resname = $connect->query($sql2);
// $resname2 = $resname->fetch_assoc();
// header('Location:index.php?search=' .$resname2['username'] );
header('Location:index.php');
}




