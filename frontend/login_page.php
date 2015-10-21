<?php
session_start();
if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
    header('Location: ../admin/home.php') ;
}
include "../php_library/class_frontend.php";
$user = new Frontend();
if(isset($_POST['submit'])){
  if(isset($_POST['remember_me'])){
           $_SESSION['cookie'] = 'enable';           
     }
   if(!in_array(null, $_POST)){
      $check = $user->login_checker($_POST);
       if($check === 1){
           $user = $_POST['username'];
           $_SESSION['username'] = $user;           
           header('Location: ../admin/home.php');
       }else{
           $message = $check;
       }
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in Now</title>
    <link rel="stylesheet" href="../style/css/bootstrap.css">
    <link rel="stylesheet" href="../style/css/front_end.css">
</head>
<body>
<div class="container">
    <form class="form-signin" method="post">
        <h2 class="alert-warning"><?php if(isset($message)) echo $message ?></h2>
        <br>
        <h2 class="form-signin-heading">Please Log in</h2>
        <label for="username" class="sr-only">username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input name="remember_me" type="checkbox" value="1"> Remember me
            </label>
        </div>
        <button value="not_null" name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div> <!-- /container -->
</body>
</html>
