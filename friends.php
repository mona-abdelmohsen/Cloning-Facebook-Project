<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freinds</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/messenger.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet"> -->
</head>
<body>
  <div class="page">
    <div class="left">
      <a href="index.html"><i class="fa-brands fa-facebook" id="face-logo"></i></a>
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
      <div class="all-item">
        <div class="choosen">
          <a href=""><button id="bt1">Friends</button></a>
          <a href=""><button id="bt2">Friend Request</button></a>
        </div>
          <h6>Freinds</h6>
          <div class="search">
            <form action="friends.php" method="POST">
              <input type="text"id="search" placeholder="search" name="search">
              <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
              <input type="submit" value="">
            </form>
          </div> 
          
          
          <div class="messages">
            <ul id="mes-frinds">
              
                <?php
            include('connect_DB.php');
            if($_POST){
                $search=$_POST['search'];
                $sql="select friend_name from friends where friend_name ='".$search."'";
                $res=$connect->query($sql);
                $name=$res->fetch_assoc();
                
                if(is_array($name)&&count($name)>0 ){
                    echo '<li>';
                    echo '<div class="frind">';
                    echo ' <img src="images/f.jfif" alt="">';
                    echo '<p>'. $name['friend_name'] .'</p>';
                    echo '<span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>';
                    echo '<div class="option">';
                    echo '<ul id="opt">';
                        echo '<li>View Profile</li>';
                        echo '<li>Send Message</li>';
                        echo '<li>Delete Friend</li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</li>';
                    
                    }
                    else{

                    echo 'not found' ;
                    }
                
                }
                else {
                    $sql2 = "select friend_name from friends";
                    $res2 = $connect->query($sql2);
                    while($names=$res2->fetch_assoc()) {
                        echo '<li>';
                    echo' <div class="frind">';
                    echo ' <img src="images/f.jfif" alt="">';
                    echo '<p>'. $names['friend_name'] .'</p>';
                    echo '<span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>';
                    echo '<div class="option">';
                    echo '<ul id="opt">';
                        echo '<li>View Profile</li>';
                        echo '<li>Send Message</li>';
                        echo '<li>Delete Friend</li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</li>';
                    }
                    }
            ?>
                
                </div>
              </div>
            </li>
            <!-- <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>mohmed </p>
                  <span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                </div>
            </li>
            <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed </p>
                  <span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                </div>
            </li>
            <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed mohmed</p>
                  <span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                </div>
            </li>
            <li>
                <div class="frind">
                  <img src="images/f.jfif" alt="">
                  <p>Ahmed mohmed</p>
                  <span class="fr-option"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                </div>
            </li>
             -->
            </ul>
          </div>
      </div>
      </div>
    
      
    </div>
  
  </div>




    <script src="js/frinds.js"></script>
    
</body>
</html>