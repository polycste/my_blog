<?php

include '../php_library/class_frontend.php';
$obj = new Frontend;
	if(isset($_POST['submit'])){
		if(isset($_POST['first_name']) && $_POST['last_name'] && $_POST['date_of_birth'] && $_POST['username'] && $_POST['password'] &&
		$_POST['c_password'] ){
            if($_POST['password'] == $_POST['c_password']){
                $obj->insert_into_user_table($_POST);
                $message = "Thank you for registering on our blog  " . $_POST['username'];
            }else{
                $error = "Your password don't match";
            }
		}
	}
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <?php if(isset($error))echo "<h1 class=alert-warning>$error</h1>"; ?>
                <?php if(isset($message))echo "<h1 class=alert-success>$message</h1>"; ?>
                <h2>Please Registration Now</h2>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="first name" required autofocus>
                </div>
                <div class="from-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="last name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="Date of birth" required autofocus>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="c_password">Confirm Password</label>
                    <input type="password" id="c_password" name="c_password" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Registration</button>
            </form>
            <br>
        </div><!--Left side-->
        <!--        Side bar    -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Already have Account</h4>
                <a class="btn btn-primary btn-lg" href="login_page.php">Login Here</a>
            </div>
            <?php include 'sidebar.php'; ?>
        </div><!-- /.blog-sidebar -->
    </div>
</div>
<footer class="blog-footer">
    <p>Blog created by Poly.</p>
    <p>
    <p>Already have account <a href="login_page.php">Login Here</a></p>
    <a href="#">Back to top</a>
    </p>
</footer>

<script src="../style/js/jquery-1.11.3.js"></script>
<script src="../style/js/bootstrap.js"></script>
</body>
</html>