<?php
include('connect_DB.php');
if($_POST){
$search=$_POST['search'];
$sql="select friend_name from friends where friend_name ='".$search."'";
$res=$connect->query($sql);
$name=$res->fetch_assoc();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/messenger.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="page">
      <div class="left">
        <a href="index.php"><i class="fa-brands fa-facebook" id="face-logo"></i></a>
        <h6>Home</h6>
        <ul>
          <li><a href="messenger.html"><i class="fa-brands fa-facebook-messenger"></i></a></li>
          <li><a href="notifucation.html"><i class="fa-solid fa-bell"></i></a></li>
          <li><a href="allfrinds.html"><i class="fa-solid fa-user-group"></i></a></li>
          <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
        </ul>
  
      </div>
      <div class="center-page">
        <div class="nav">
          <h4>Messenger</h4>
          <!-- <div class="user">
              <img src="images/d.jfif" id="profile-foto">
              <p>nour mohmed</p>
          </div> -->
          <div class="search">
            <form action="messenger.php" method="POST">
              <input type="text"id="search" placeholder="search" name="search">
              <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
              <input type="submit" value="">
            </form>
          </div>
          <!-- <div class="corner">
              <div class="user">
                  <img src="images/d.jfif" id="profile-foto">
                  <p>nour mohmed</p>
              </div>
              <div class="search">
                  <input type="text"id="search" placeholder="search">
                  <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
              </div>  
          </div> -->
          <div class="messages">
            <ul id="mes-frinds">
             <li>
             <div class="frind">
             <?php 
             if($_POST){
             if(is_array($name)&&count($name)>0 ){
                echo ' <img src="images/f.jfif" alt="">';
                  echo '<p>'. $name['friend_name'] .'</p>';
                }
                else{
                  echo '<p>'. 'Not found any result' .'</p>';
                }}?>
                </div>
             </li>
             <li>
              <div class="frind">
                <img src="images/f.jfif" alt="">
                <p>mohmed sayed</p>
              </div>
           </li>
           <li>
            <div class="frind">
              <img src="images/f.jfif" alt="">
              <p>mohmed sayed</p>
            </div>
           </li>
             <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed mohmed</p>
                </div>
             </li>
             <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed mohmed</p>
                </div>
             </li>
             <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed mohmed</p>
                </div>
             </li>
            </ul>
          </div>
        </div>
        
      </div>
    
    </div>
    
    
</body>
</html>