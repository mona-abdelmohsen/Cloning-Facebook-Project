<?php
require('connect_DB.php');
session_start();
$uid = "select user_ID from users where username = '" . $_SESSION['username'] . "'"; 
$uids = $connect->query($uid);
$id = $uids->fetch_assoc();
// echo $id['user_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Profile</title>
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
        <?php 
            if(isset($_POST['username']) && strlen($_POST['username']) >0 ) {
              $data_request = "select * from users where username = '" . $_POST['username'] . "'";
              $data = $connect->query($data_request);
              $data1 = $data->fetch_assoc();

            $check ="select state from friend_requests where user_Id='".$id['user_ID']."' and res_id = '".$data1['user_ID']."'";
            $check1 = $connect->query($data_request);
            $check_values = $check1->fetch_assoc();
            
        ?>
          <img src="<?php if(isset($data1['image_profile'])&&strlen($data1['image_profile'])>0){echo "images/".$data1['image_profile'];}else {echo "images/1.jpg" ;}?>" id="header" alt="">
        <img src="<?php if(isset($data1['image_background'])&&strlen($data1['image_background'])>0){echo "images/".$data1['image_background'];} else {echo "images/images.jpg" ;}?>" id="profile" alt="">
        <h5><?php if(isset($_POST['username'])){echo $_POST['username']; }?></h5>
        <br>
        <!-- <form action="r.php" method="POST">
            <input type="hidden" name="user_id" value="<?php //echo $id['user_ID']; ?>">
            <input type="hidden" name="res_id" value="<?php  //echo $data1['user_ID'];?>"> -->
            <!-- <button id="but1" type="submit" >Send Request</button>  -->
        </form>
        <button id="but2">Message</button>   
      </div>
      <div class="content-out">
        <div class="content">
        <?php 
                  $post_command = "select id, image, content from posts where user_id = " .$data1['user_ID'] ;
                  $post = $connect->query($post_command);
                  
                  while($posts = $post->fetch_assoc()) {

                 ?>
          <div class="posts">
          
            <div class="post-username"> 
              <img <?php if(isset($_POST['userimage'])){echo 'src="images/' . $_POST['userimage'] .'"'; }?> id="posts-foto">
              <p><?php if(isset($_POST['username'])){echo $_POST['username']; }?></p>
            </div>
            <div>
            <?php if(strlen($posts['content'])>0 && strlen($posts['image'])>0) {    ?>
            <p><?php echo  $posts['content'] ;?></p> 
            <?php echo "<img src='images/" . $posts['image'] . "' alt=''>" ;?> 
            <?php }?>
            <?php if(strlen($posts['content'])>0 && strlen($posts['image'])==0) {?>
                <p><?php echo  $posts['content'] ;?></p> 
                <?php } 
                    if(strlen($posts['image'])>0 && strlen($posts['content'])==0) {
                        echo "<img src='images/" . $posts['image'] . "' alt=''>" ;}?>
            </div>
          
            <div>
              <ul id="reacts">
                <li><i class="fa-regular fa-thumbs-up"></i></li>
                <li><i class="fa-regular fa-thumbs-down"></i></li>
                <li><i class="fa-solid fa-comment-dots"></i></li>
              </ul>
            </div>
            <div class="coment">
            <?php  $show_comment = "select  content , id from  comments where post_id =".$posts['id'];
               $c = $connect->query($show_comment);
               while($x = $c->fetch_assoc()){ 
              ?>
              <div class="post-username">
              <?php $img = "select image_profile from users where username = '" . $_SESSION['username'] . "'";
              $img1 = $connect->query($img);
              $row = $img1 -> fetch_assoc();
                echo "<img src='images/" . $row['image_profile'] . "' id='profile-foto'>";
              
        ?>
              <p><?php if(isset($_POST['username'])){echo $_SESSION['username']; }?></p>
              </div>
              <?php echo '<p id="coment-p">'. $x['content'].'</p>';?>
              <?php }?>
              
            </div>
            <!-- <form action="friendProfile.php" method="get">
                <input type="text" value="" name="comment">
                <input type="hidden" value="<?php //echo $posts['id']; ?>" name="post_id">
                <input type="hidden" value="<?php //echo $id['user_ID']?>" name="user_id">
                <input type="submit">
                </form> -->
                <?php
                //  if(isset($GET['comment']) && strlen($GET['comment']) >0 ) 
                //  {
                //   $insertcomm = "insert into comments(content, post_id) values('" . $_GET['comment'] ."'," . $_GET['post_id'] . ")";
                //   $insertquery = $connect->query($insertcomm);
                //  }
                ?>
          </div>
          <?php }?>
        
          
        </div>
        <div class="right">
          <div class="details">
            <ul>
            <li><i class="fa-solid fa-briefcase"></i><p><?php if(isset($data1['work'])&&strlen($data1['work'])>0){echo $data1['work'];}else{echo 'Work in';}?></p></li>
              <li><i class="fa-solid fa-graduation-cap"></i><p><?php if(isset($data1['study'])&&strlen($data1['study'])>0){echo $data1['study'];}else{echo 'study in';}?></p></li>
              <li><i class="fa-solid fa-house-chimney"></i><p><?php if(isset($data1['live'])&&strlen($data1['live'])>0){echo $data1['live'];}else{echo 'live in';}?></p></li>
              <li><i class="fa-solid fa-location-dot"></i><p><?php if(isset($data1['from'])&&strlen($data1['from'])>0){echo $data1['from'];}else{echo 'from';}?></p></li>
              <li><i class="fa-sharp fa-solid fa-calendar-days"></i><p><?php if(isset($data1['Birthday'])&&strlen($data1['Birthday'])>0){echo $data1['Birthday'];}else{echo 'Birthday';}?></p></li>
              <li><i class="fa-solid fa-link"></i><a href=""><?php if(isset($data1['link'])&&strlen($data1['link'])>0){echo $data1['link'];}else{echo 'URL';}?></a></li>
            </ul>
            <?php }?>
            <!-- <button>Edit details</button> -->
          </div>
        </div>
      </div>
        
      </div>
      
      
    </div>
  </div>
  <script>
    let btn=document.querySelector("#but2")
btn.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="chat.html";
    },1000)
})
let btn1=document.querySelector(".edit")
btn1.addEventListener("click",function(e){
    e.preventDefault();
    setTimeout(()=>{
        window.location="updateDetails.html";
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


  </script>
</body>
</html>