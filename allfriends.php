<?php
require ('connect_DB.php');
session_start();
?>
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
      <a href="index.php"><i class="fa-brands fa-facebook" id="face-logo"></i></a>
      <h6>Home</h6>
      <ul>
        <li><a href="messenger.html"><i class="fa-brands fa-facebook-messenger"></i></a></li>
        <li><a href="notifucation.html"><i class="fa-solid fa-bell"></i></a></li>
        <li><a href="allfriends.php"><i class="fa-solid fa-user-group"></i></a></li>
        <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
      </ul>

    </div>
    <div class="center-page">
      
    <div class="nav">
      <div class="all-item">
        <div class="choosen">
          <a href="#"><button id="bt1">Friends</button></a>
          <a href="#"><button id="bt2">Friend Request</button></a>
        </div>
          <div  id="nav1">
            <h6>Freinds</h6>
            <div class="search">
              <form action="allfriends.php" method="post">
                <input type="text"id="search" placeholder="search" name="search">
                <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
                <input type="submit" value="" id="inputpost">
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
                <?php
                  if($_POST){
                    $search=$_POST['search'];
                    $sql="select friend_name, friend_image from friends where friend_name ='".$search."'";
                    $res=$connect->query($sql);
                    $name=$res->fetch_assoc();
                    
                    if(is_array($name)&&count($name)>0 ){
                        echo '<li>';
                        echo '<div class="frind">';?>
                        <img src ="<?php if(isset($name['friend_image'])&&strlen($name['friend_image'])>0){echo 'images/'.$name['friend_image'];}else {echo "images/images.jpg" ;}?> ">
                        <?php
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
                      $sql2 = "select friend_name, friend_image from friends";
                      $res2 = $connect->query($sql2);
                      while($names=$res2->fetch_assoc()) {
                        echo '<li>';
                            
                        echo'<form action="friendProfile2.php" method="post">
                        <input type="hidden" value="'. $names['friend_image'] . '" name="userimage">' . '
                        <input type="hidden" value="'. $names['friend_name'] . '" name="username">' . '
                        <button type="submit" style="margin-bottom:-40px;"> <div class="frind">';
        
                        if(isset($names['friend_image'])&&strlen($names['friend_image'])>0){
                          echo '<img src="images/'.$names['friend_image'] . '">';
                        }else {
                          echo '<img src="images/images.jpg">' ;}
        
                        
                        
                        echo '<p>'. $names['friend_name'] .'</p>';
                        
                        echo '</div></button></form>';
                        echo '</li>';
                      }
                        }
                ?>
              
              </ul>
            </div>
          </div>


          <div id="nav2" style=" display: none" >
            <h6>Friend Request</h6>
            <div class="messages">
              <ul id="mes-frinds">
                <?php
                $sql = "select user_ID from users where username = '" . $_SESSION['username'] . "'";
                $uid = $connect->query($sql);
                $uids = $uid->fetch_assoc();

                $sql2 = "select user_id from friend_requests where res_id = ". $uids['user_ID'] ;
                $rid = $connect->query($sql2);
                while($rids = $rid->fetch_assoc()) {
                  $sql3 = "select username,image_profile from users  where user_ID = " . $rids['user_id']  ;
                  $rname = $connect->query($sql3);
                  $rnames = $rname->fetch_assoc();
                        echo '<li>
                        <div class="frind">';
                        if(isset($rnames["image_profile"]) && strlen($rnames["image_profile"])>0){echo '<img src="images/' . $rnames["image_profile"] . '" alt="">';}else{echo '<img src="images/images.jpg">'; };
  
                        echo '<p>' . $rnames['username'] . '</p>';
                ?>
                <span>
                      <form action="confirm.php" method="post">
                          <input type="hidden" name="user_id" value="<?php echo  $uids['user_ID']?>" >
                            <input type="hidden" name="friend_id" value="<?php echo $rids['user_id']?>" >
                            <input type="hidden" name="friend_image" value="<?php echo $rnames['image_profile']?>">
                            <input type="hidden" name="friend_name" value="<?php echo $rnames['username']?> " >
                              <button class="btn1" type="submit">Confirm</button>
                        </form>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="rid" value="<?php echo $rids['user_id'];?> ">
                            <button class="btn2" type="submit">Delete</button></span>
                        </form>
                        </div>
                          </li><?php }?>
           </ul>
          </div>
          
          
          </div>
      </div>
      </div>
      
      
    </div>
  
  </div>



    <script src="js/jquery-3.6.2.min.js"></script>
    <script>
      $("#bt1").click(function(){
        $("#nav1").show(500);
        $("#nav2").hide(500);

    });
    $("#bt2").on("click",function(){
        $("#nav2").show(500);
        $("#nav1").hide(500);
    });

    $("#inputpost").css({"margin-left":"40px"})
    </script>
    <!-- <script src="js/frinds.js"></script> -->
    
</body>