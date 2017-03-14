<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../view/style.css">
        <title> Finesse Co. </title>
    </head>
    <body>
        <div class="header">
            <div class="links">
                <a href="login.php">Login 222</a>
                <a href="register.php">Register Now</a>
            </div>
            <div class="title">
                <h1>Finesse Co.</h1>
                <h3>Buy and Sell</h3>
            </div>
            <div class="categories">
                <a href="laptops.php">Laptops</a>
                <a href="tablets.php">Tablets</a>
                <a href="phones.php">Phones</a>
                <a href="tv.php">TVs</a>
                <a href="mp3.php">MP3s</a>
            </div>
        </div>
    </body>

</html>

<?php
require_once "model/model.php";

session_save_path("sess");
session_start();

switch ($_SESSION['state']) {
    
    case "register":
        $user  = $_REQUEST['user'];
        $pwd   = $_REQUEST['password'];
       // $fname = $_REQUEST['firstname'];
       // $lname = $_REQUEST['lastname'];
       // $email = $_REQUEST['email'];
       $success = false;
        
        if (empty($user) || empty($pwd)) {
            echo 'Missing required information';
        }
        else {
            $success = registerUser($user, $pwd);
        }
        if($success){  
            $_SESSION['state']    = 'login';
            $view                 = "login.php";
        }
        
        break;
        
    case "login":
        $valid     = $_SESSION['db']->validateUser($_REQUEST['user'], $_REQUEST['password']);
    
        $_SESSION['state']    = 'dash';
        $view                 = "dash.php";
        break;
    
    
    }
?>
