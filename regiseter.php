<?php
//conact to database
include('connect_DB.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    //data
    $username=$_POST['username']  ;
    $email=$_POST['email'] ;
    $password=$_POST['password'] ;
    $repassword=$_POST['prepassword'] ;
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    //ensure if the Email of user is exists in database or Not

$ispass=false;
$sql1="select email from users where email = '".$email ."'";
$res=$connect->query($sql1);
$row = $res -> fetch_assoc();
// echo is_array($row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <form action="regiseter.php" method="POST">
                <h2>Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="username" name="username" value="<?php  if(isset($username)){echo $username; } ?>">
                </div>
               <?php 
               if($_POST){
               if( !preg_match('/[A-Za-z][A-Za-z0-9_\s]{7,29}/',$_POST['username']) &&strlen($username)>0 ){?>
        <span>UserName must be at least 8 Characters and It begins with a letter</span>
                      <?php $ispass=true;} 
                      if(strlen($username)==0){?>
        <span>UserName is required</span>
                    <?php  $ispass=true; }}?>
                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="<?php  if(isset($email)){echo $email; } ?>">
                </div>
                  <?php if($_POST){
               if( !preg_match('/[A-Za-z][A-Za-z0-9_\s]{7,29}/',$_POST['email']) &&strlen($email)>0 ){?>
                <span>Please Enter The Vaild Email</span>
                      <?php $ispass=true;} 
                      if(strlen($email)==0){?>
                <span>Email is required</span>
                    <?php $ispass=true;}
                if(is_array($row)){ $ispass=true;?>
                    <span>The email is already exists  </span>
                <?php }
                }?>   
                  <div class="input-field">
                    <i class="fa-sharp fa-solid fa-venus-mars"></i>
                    <select name="gender" id="" value="<?php  if(isset($gender)){echo $gender; } ?>">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>                
                     <div class="input-field">
                    <i class="fa-sharp fa-solid fa-calendar-days"></i>
                    <input type="date" placeholder="birthday date" name="date" value="<?php  if(isset($date)){echo $date; } ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="password" name="password" value="<?php  if(isset($password)){echo $password; } ?>">
                </div>
                 <?php if($_POST){
               if( !preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}/',$_POST['password']) &&strlen($password)>0 ){?>
                <span>The password must contain 8 characters (numbers, capital and lowercase letters) </span>
                      <?php $ispass=true; } 
                      if(strlen($password)==0){?>
                <span>password is required</span>
                    <?php  $ispass=true;}}?>  
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="verify password" name="prepassword" value="<?php  if(isset($repassword)){echo $repassword; } ?>">
                </div>
                <?php if($_POST){
               if($password !== $repassword &&  strlen($repassword)>0 ){?>
                <span>verify password difference about password</span>
                      <?php  $ispass=true; } 
                      if(strlen($repassword)==0){?>
                <span>verify password is required</span>
                    <?php  $ispass=true; }}?> 
                <div class="input-field">
                    <i class="fa-solid fa-image"></i>
                    <input type="file" placeholder="" name="image_profile" >
                </div>
                <div class="input-field">
                   <i class="fa-solid fa-image"></i>
                    <input type="file" placeholder="" name="image_background">
                </div>
                <input type="submit" value="SIGN UP" class="btn">
            </form>
        </div>
        <div class="panel">
            <div class="img">
                <div class="content">
                    <h3>Welcome Back!</h3>
                    <p>To keep connected with us please login with your personal info</p>
                </div>
                <div class="btn>">
                    <a href="login.php"><input type="submit" class="btn" value="sign in"></a>
                </div>
            </div>
        </div>
    </div>
    <?php 
if($_POST){
    if(isset($ispass)&& $ispass==false){
    $sql2="insert into users (username,gender,email	,Birthday,password, image_profile, image_background)values('".$username."','".$gender."','".$email."','".$date."','".$password."','".$_POST['image_profile']."','".$_POST['image_background']."')";
    $connect->query($sql2);
    session_start();
    $_SESSION['username'] =$username;
    header('Location:index.php');

    }

}
    ?>
</body>
</html>