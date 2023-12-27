<?php
include('connect_DB.php');
if($_POST){
$search=$_POST['search'];
$sql="select friend_name from friends where friend_name ='".$search."'";
$res=$connect->query($sql);
$name=$res->fetch_assoc();
}
if(is_array($name)&&count($name)>0 ){
    echo '<li>';
     echo' <div class="frind">';
     echo ' <img src="images/f.jfif" alt="">';
      echo '<p>'. $name['friend_name'] .'</p>';
     echo '</div>';
   echo '</li>';
    }
    else{

       echo 'not found' ;
    }
?>