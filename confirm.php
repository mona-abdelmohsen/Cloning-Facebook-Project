<?php
include('connect_DB.php');
session_start();
if($_POST){
    $sql = "insert into friends (friend_id,friend_name,user_id,friend_image	)values ('" . $_POST['friend_id'] . "','" . $_POST['friend_name'] . "','" . $_POST['user_id'] . "','" . $_POST['friend_image'] . "')";

    $conform = $connect->query($sql);
    $sq2 = "delete from friend_requests where res_id = " .  $_POST['friend_id'] ;
    $delete = $connect->query($sq2);
    header('Location:allfriends.php');

}