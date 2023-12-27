<?php
include('connect_DB.php');
session_start();

  // select all posts of users
  $show_post = "select id,content, image from posts";
$res = $connect->query($show_post);
//update the date of users
$idCommand = "select user_ID from users where username = '" . $_SESSION['username'] . "'";
$id = $connect->query($idCommand);
$idu = $id->fetch_assoc();
$user_id = $idu['user_ID'];

if($_POST){
    $sql="update users set 
       work = '".$_POST["work_in"] .
    "',study = '".$_POST["study_in"].
    "',live = '".$_POST["live_in"].
    "',image_profile = '".$_POST["profile_image"].
    "',image_background = '".$_POST["background_image"].
    "',Birthday	 = '".$_POST["Birthday"].
    "',link = '".$_POST["link"].
     "',`from` = '".$_POST["from"].
     " 'where user_ID = ".$user_id;

       $data=$connect->query($sql);

        
}
$show_update = "select username, work,study,live,image_profile,image_background,Birthday, link ,`from` from users where user_ID = ".$user_id;
$result= $connect->query($show_update);
$update= $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profile.css">
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
        <li><a href="allfriends.php"><i class="fa-solid fa-user-group"></i></a></li>
        <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>
      </ul>

    </div>
    <div class="home-body">
    
    <div class="center">
      <div class="potos">
        <img src="<?php if(isset($update['image_profile'])&&strlen($update['image_profile'])>0){echo "images/".$update['image_profile'];}else {echo "images/1.jpg" ;}?>" id="header" alt="">
        <img src="<?php if(isset($update['image_background'])&&strlen($update['image_background'])>0){echo "images/".$update['image_background'];} else {echo "images/images.jpg" ;}?>" id="profile" alt="">
        <h5><?php if(isset($update['username'])){echo $update['username'];}?></h5>
        <br>
        <!-- <form action="updateDaties.php" method="get"> -->
        <button id="but1">Edit Profile</button>
        <!-- </form> -->
      </div>
      <div class="content-out">
        <div class="content">
        <?php while($r = $res->fetch_assoc()){ ?>
        <div class="posts">
            <div class="post-username">
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
        <div class="right">
          <div class="details">
            <ul>
              <li><i class="fa-solid fa-briefcase"></i><p><?php if(isset($update['work'])&&strlen($update['work'])>0){echo $update['work'];}else{echo 'Work in';}?></p></li>
              <li><i class="fa-solid fa-graduation-cap"></i><p><?php if(isset($update['study'])&&strlen($update['study'])>0){echo $update['study'];}else{echo 'study in';}?></p></li>
              <li><i class="fa-solid fa-house-chimney"></i><p><?php if(isset($update['live'])&&strlen($update['live'])>0){echo $update['live'];}else{echo 'live in';}?></p></li>
              <li><i class="fa-solid fa-location-dot"></i><p><?php if(isset($update['from'])&&strlen($update['from'])>0){echo $update['from'];}else{echo 'from';}?></p></li>
              <li><i class="fa-sharp fa-solid fa-calendar-days"></i><p><?php if(isset($update['Birthday'])&&strlen($update['Birthday'])>0){echo $update['Birthday'];}else{echo 'Birthday';}?></p></li>
              <li><i class="fa-solid fa-link"></i><a href=""><?php if(isset($update['link'])&&strlen($update['link'])>0){echo $update['link'];}else{echo 'URL';}?></a></li>
            </ul>
            <button class="edit">Edit details</button>
          </div>
        </div>
      </div> 
      </div>
    </div>
  </div>
  <script src="js/jquery-3.6.2.min.js"></script>
  <script>
    let btn=document.querySelector("#but1")
let btn1=document.querySelector(".edit")


btn.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="updateDaties.php";
    },1000)
})
btn1.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="updateDaties.php";
    },1000)
})


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


$("#but1").on("mouseover",function(){
    $(this).css({"opacity":".7"});
})
$("#but1").on("mouseout",function(){
    $(this).css({"opacity":"1"});
})

  </script>
</body>
</html>