<?php
require ('connect_DB.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request</title>
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
            <h6>Friend Request</h6>
            <div class="search">
              <form action="">
                <input type="text"id="search" placeholder="search">
                <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
                <input type="submit" value="">
              </form>
            </div> 
            <div class="messages">
                <ul id="mes-frinds">
                  <li>
                    <div class="frind">
                        <img src="images/f.jfif" alt="">
                        <p>Ahmed mohmed</p>
                        <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                   </div>
                 </li>
                 <li>
                    <div class="frind">
                      <img src="images/f.jfif" alt="">
                      <p>mohmed sayed</p>
                      <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                    </div>
                 </li>
                 <li>
                    <div class="frind">
                      <img src="images/f.jfif" alt="">
                      <p>Ahmed mohmed</p>
                      <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                    </div>
                 </li>
                 <li>
                    <div class="frind">
                      <img src="images/f.jfif" alt="">
                      <p>Ahmed mohmed</p>
                      <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                    </div>
                 </li>
                 <li>
                    <div class="frind">
                      <img src="images/f.jfif" alt="">
                      <p>Ahmed mohmed</p>
                      <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                    </div>
                 </li>
                 <li>
                  <div class="frind">
                    <img src="images/f.jfif" alt="">
                    <p>Ahmed mohmed</p>
                    <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                  </div>
               </li>
               <li>
                  <div class="frind">
                    <img src="images/f.jfif" alt="">
                    <p>Ahmed mohmed</p>
                    <span><button class="btn1">Confirm</button><button class="btn2">Delete</button></span>
                  </div>
               </li>  
             </ul>
            </div>
          </div>
        
          
        </div>
      
      </div>

      <script src="js/jquery-3.6.2.min.js"></script>
      <script>
        
      </script>
</body>
</html>