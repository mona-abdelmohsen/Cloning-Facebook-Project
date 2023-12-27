<?php
require('connect_DB.php');
session_start();
$sql = "delete from friend_requests where res_id = " . $_POST['rid'];
$delete = $connect->query($sql);
header('Location:allfriends.php');