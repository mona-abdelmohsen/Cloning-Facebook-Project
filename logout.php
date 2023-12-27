<?php
//end sesstion 
session_start();
session_destroy();

header("Location:login.php");
