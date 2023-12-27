<?php
$server = "localhost";
$user ="root";
$password = "";
$db = "facebook";
$connect = new mysqli($server,$user,$password,$db);
//update the date of users
$user_id=1;

if($_POST){
    $sql="update users set 
       work = '".$_POST["work_in"] .
    "',study = '".$_POST["study_in"].
    "',live = '".$_POST["live_in"].
    "',image_profile = '".$_POST["profile_image"].
    "',image_background = '".$_POST["background_image"].
    "',Birthday = '".$_POST["Birthday"].
    "',link = '".$_POST["link"].
     "',`from` = '".$_POST["from"].
     " 'where user_ID = ".$user_id;

       $data=$connect->query($sql);

        
}
$show_update = "select username,work,study,live,image_profile,image_background,Birthday, link ,`from` from users where user_ID = ".$user_id;
$result= $connect->query($show_update);
$update= $result->fetch_assoc();
?>