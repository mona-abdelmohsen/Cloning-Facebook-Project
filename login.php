<?php
$serverName = "localhost";
$NameDB ="facebook";
$UserDB="root";
$Pass ="";
$connect =new mysqli($serverName, $UserDB, $Pass, $NameDB);

if($_POST){
    $check=0;
     $UserName = $_POST['username'];
     $password = $_POST['password'];
    $sql = "select username,password from users ";
    $q = $connect->query($sql);
    if($q->num_rows >0){
        while($row = $q -> fetch_assoc())
        {
             if($row["username"]===$UserName && $row["password"]===$password){
                   $check=1;
                   
                      break;
             }
             
        }
       

     }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="login.php" method="POST" autocomplate="off">
                <h2>Sign in</h2>
                <?php 
                if($_POST){
                if(strlen($UserName)>0 && strlen($password)>0 && $check==0 ){?>
                    <span>Please Enter username and password Vaild</span>
                 <?php }}?>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="username" name="username" value="<?php if(isset($UserName)){echo $UserName;}?>" >
                </div>
                <?php 
                 if($_POST){
                if(strlen($UserName)==0){?>
                    <span>Please Enter username</span>
                 <?php }}?>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="password" name="password" value="<?php if(isset($password)){echo $password;}?>" >
                </div>
                <?php 
                 if($_POST){
                if(strlen($password)==0){?>
                    <span>Please Enter password</span>
                 <?php }}?>
                <input type="submit" value="LOGIN" class="btn">
                <p>forgot password?</p>
            </form>
        </div>
        <div class="panel">
            <div class="img">
                <div class="content">
                    <h3>New Here?</h3>
                    <p>sign up and discover your virtual world</p>
                </div>
                <div class="btn>">
                <a href="regiseter.php"><input type="submit" class="btn" value="sign up"></a>
                </div>
            </div>
        </div>
    </div>
    <?php 
     if($_POST){
    if($check==1){
        session_start();
        $_SESSION['username'] = $UserName;
        header('Location:index.php');
    }}
    ?>
</body>
</html>