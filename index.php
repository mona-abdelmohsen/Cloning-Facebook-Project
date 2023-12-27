<?php
include('connect_DB.php');
session_start();

  if(count($_POST)==3){
    if(strlen($_POST['content'])>0 || $_POST['image']>0) {
                $create_post = "insert into posts (content, image) values('". $_POST['content'] . "','". $_POST['image']."')";
                $connect->query($create_post);
        }
}

$show_post = "select id,content, image from posts";
$res = $connect->query($show_post);

if (count($_POST)==2) {
  if(strlen($_POST['comment'])>0){
   $sql = "insert into comments (content,post_id) values('" . $_POST['comment'] ."','".$_POST['post_id'] ."')";
  $comment = $connect->query($sql);
  }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
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
        <li><a href="messenger.php"><i class="fa-brands fa-facebook-messenger"></i></a></li>
        <li><a href="notifucation.html"><i class="fa-solid fa-bell"></i></a></li>
        <li><a href="allfriends.php"><i class="fa-solid fa-user-group"></i></a></li>
        <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
      </ul>

    </div>
    <div class="home-body">
      <div class="center">
        <form action="index.php" method="post">
          <input type="hidden" name='id' value="1">
          <input type="text" id="post" placeholder="what is on your mind" name="content"> 
          <a href=""><input  type="file" name="image"></i></a>
          <input type="submit" id="submitpost">
        </form>
        <div class="content">
            <?php
                while($r = $res->fetch_assoc()){ 
            ?>
          <div class="posts">
            <div class="post-username">
              <h2><?php $_SESSION['username']?></h2>
              <?php $img = "select image_profile from users where username = '" . $_SESSION['username'] . "'";
              $img1 = $connect->query($img);
              $row = $img1 -> fetch_assoc();
                echo "<img src='images/" . $row['image_profile'] . "' id='profile-foto'>";
              
        ?>
        
        <p><?php echo $_SESSION['username']?></p>
            </div>
            <?php if(strlen($r['content'])>0 && strlen($r['image'])>0) {    ?>
            <p><?php echo  $r['content'] ;?></p> 
            <?php echo "<img src='images/" . $r['image'] . "' alt=''>" ;?> 
            <?php }?>
            <?php if(strlen($r['content'])>0 && strlen($r['image'])==0) {?>
                <p><?php echo  $r['content'] ;?></p> 
                <?php } 
                    if(strlen($r['image'])>0 && strlen($r['content'])==0) {
                        echo "<img src='images/" . $r['image'] . "' alt=''>" ;}?>
            <div>
              <ul id="reacts">
                <li ><i class="fa-regular fa-thumbs-up frist"></i></li>
                <li ><i class="fa-regular fa-thumbs-down second"></i></li>
                <li ><i class="fa-solid fa-comment-dots third"></i></li>
              </ul>
            </div>
            <div class="coment">
           <?php  $show_comment = "select  content , id from  comments where post_id =".$r['id'];
               $c = $connect->query($show_comment);
               while($x = $c->fetch_assoc()){ 
              ?>
              <div class="post-username">
              <?php $img = "select image_profile from users where username = '" . $_SESSION['username'] . "'";
              $img1 = $connect->query($img);
              $row = $img1 -> fetch_assoc();
                echo "<img src='images/" . $row['image_profile'] . "' id='profile-foto'>";
              
        ?>
        <p><?php echo $_SESSION['username']?></p>
              </div>
              <?php echo '<p id="coment-p">'. $x['content'].'</p>';?>
              <?php }?>
            </div>
            <div class="comentform">
              <form action="index.php" method="POST">
                <input type="text" value="" name="comment">
                <input type="hidden" value="<?php echo $r['id']; ?>" name="post_id">
                <input type="submit">
                </form>
                    </div>
                    </div>
            <?php 
          } ?>
          
        </div>
     </div>
    <div class="right">
      <div class="user">
        <!-- me -->
        <?php $img = "select image_profile from users where username = '" . $_SESSION['username'] . "'";
       
              $img1 = $connect->query($img);
              $row = $img1 -> fetch_assoc();?>
              <a href="profile.php"><?php echo "<img src='images/" . $row['image_profile'] . "' id='profile-foto'>";?></a>
        <!-- <img src="images/d.jfif" id="profile-foto"> -->
        <p><?php echo $_SESSION['username']?></p>
      </div>
      <div class="search">
        <form action="index.php" method="get">
          <input type="text"id="search" placeholder="search" name="search">
          <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>
          <input type="submit" value="">
        </form>
      </div>
      <?php
          $usercommand = "select username, image_profile from users where username != '" . $_SESSION['username'] . "'";
          if($_GET){
            $found = false;
            $search=$_GET['search'];
            $users = $connect -> query($usercommand);
            // if(is_array($user)&&count($user)>0 ){
              while($user = $users->fetch_assoc()) {
                if($search == $user['username']) {
                    echo '<li>';
                    
                    echo'<form action="friendProfile.php" method="post">
                    <input type="hidden" value="'. $user['image_profile'] . '" name="userimage">' . '
                    <input type="hidden" value="'. $user['username'] . '" name="username">' . '
                    <button type="submit"> <div class="frind">';

                    if(isset($user['image_profile'])&&strlen($user['image_profile'])>0){
                      echo '<img src="images/'.$user['image_profile'] . '">';
                    }else {
                      echo '<img src="images/images.jpg">' ;}

                    
                    
                    echo '<p>'. $user['username'] .'</p>';
                    
                    echo '</div></button></form>';
                    echo '</li>';
                    $found = true;
                    break;
                    
                }
   
              }
              if($found == false) {
                echo '<p>not found</p>' ;
              }
              
              }
              // }
        ?>
      <h6 id="contacts">Contacts</h6>
      <div class="messages">
        <ul id="mes-frinds">
        <?php
              $sql2 = "select friend_name, friend_image from friends";
              $res2 = $connect->query($sql2);
              while($names=$res2->fetch_assoc()) {
                echo '<li>';
                    
                echo'<form action="friendProfile2.php" method="post">
                <input type="hidden" value="'. $names['friend_image'] . '" name="userimage">' . '
                <input type="hidden" value="'. $names['friend_name'] . '" name="username">' . '
                <button type="submit" id="buttonfriend" style="width:300px;margin-bottom:-40px;padding:0;background:none;"> <div class="frind">';

                if(isset($names['friend_image'])&&strlen($names['friend_image'])>0){
                  echo '<img src="images/'.$names['friend_image'] . '">';
                }else {
                  echo '<img src="images/images.jpg">' ;}

                
                
                echo '<p>'. $names['friend_name'] .'</p>';
                
                echo '</div></button></form>';
                echo '</li>';
              }?>
        </ul>
      </div>
    </div>
    </div>
  </div>
  <script src="js/jquery-3.6.2.min.js"></script>
  <script>
    let like=document.querySelectorAll(".frist");
let dislike=document.querySelectorAll(".second");

for(let i=0;i<like.length;i++){
    like[i].addEventListener('click',function(){
        like[i].classList.add("like")
        dislike[i].classList.remove("dislike");
    })
}
for(let i=0;i<like.length;i++){
    like[i].addEventListener('dblclick',function(){
        like[i].classList.remove("like")
       
    })
}
for(let i=0;i<dislike.length;i++){
    dislike[i].addEventListener('click',function(){
        dislike[i].classList.add("dislike")
        like[i].classList.remove("like");
        
    })
}
for(let i=0;i<dislike.length;i++){
    dislike[i].addEventListener('dblclick',function(){
        dislike[i].classList.remove("dislike")
       
    })
}

//coment
let comenticon=document.querySelectorAll("i.third");
let coment=document.querySelectorAll(".comentform");
for(let i=0;i<dislike.length;i++){
    comenticon[i].addEventListener('click',function(){
        // e.preventDefault();
        coment[i].style.display="block"
    })
}
for(let i=0;i<dislike.length;i++){
    comenticon[i].addEventListener('dblclick',function(){
        // e.preventDefault();
        coment[i].style.display="none"
    })
}


$("#submitpost").css({"background":"#d4e3f3"});
$("#submitpost").on("mouseover",function(){
    $(this).css({"background":"blue"})
})
$("#submitpost").on("mouseout",function(){
    $(this).css({"background":"#d4e3f3"})
})



// $('i.frist').on('click',function(){
//     $(this).addClass('like')
//     $('i.second').removeClass('dislike')
// })
// $('i.frist').on('dblclick',function(){
//     $(this).removeClass('like')
// })

// $('i.second').on('click',function(){
//     $(this).addClass('dislike')
//     $('i.frist').removeClass('like')
// })
// $('i.second').on('dblclick',function(){
//     $(this).removeClass('dislike')
// })
// $('i.third').on('click',function(){
//     let x=$('.coment')
//     $('.comentform').css({'display':'block'})
// })
// $('i.third').on('dblclick',function(){
//     $('.comentform').css({'display':'none'})
// })

  </script>
</body>
</html>