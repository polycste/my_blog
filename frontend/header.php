<?php 
session_start();
$admin = false;
if(isset($_SESSION['username'])){
    $admin = true;
}else if (isset($_COOKIE['username'])){
    $admin = true;
}

 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Note Khata</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/css/bootstrap.css">
    <link rel="stylesheet" href="../style/css/front_end.css">
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="main-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="home.php" class="navbar-brand">Note Khata</a>
        </div>
        <!-- end navbar-header -->
        <?php if(!isset($nav)){
            $nav = "";
        } ?>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php if($nav == 'home') echo 'active'?>"><a href="home.php">Home</a></li>
                <li class="<?php if($nav == 'about') echo 'active'?>"><a href="about.php">About</a></li>
                <li class="<?php if($nav == 'contact') echo 'active'?>"><a href="">Contact</a></li>
                <?php 

                if($admin){
                    echo "<li><a href='../admin'>Dashboard</a></li>";
                }else{
                    echo "<li><a href='login_page.php'>Login</a></li>";
                }

                 ?>

                
                
            </ul>
        </div>
        <!-- end collapse -->
    </div>
    <!-- end container -->
</nav>
