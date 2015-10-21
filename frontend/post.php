<?php
require '../php_library/class_frontend.php';
$id = 1;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$obj = new Frontend();
$post = $obj->post_from_post_table_using_post_id($id);
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php   echo $post['title'] ?></h2>
                    <p class="blog-post-meta"><?php  echo $obj->blog_time_format( $post['date'] ) ?>  by <a href="author.php?id=<?php echo $post['user_id'] ?>"> <?php echo $obj->user_name_by_user_id($post['user_id'])  ?> </a></p>
                    <p> <?php  echo $post['post']  ?>  </p>
                </div><!-- /.blog-post -->
                <br>
                <br>
        </div><!-- /.blog-main -->
        <!--        Side bar    -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Don't have Account</h4>
                <a class="btn btn-primary btn-lg" href="registration_page.php">Register Here</a><br>
            </div>
            <?php include 'sidebar.php'?>
        </div><!-- /.blog-sidebar -->
    </div>
</div>
<footer class="blog-footer">
    <p>Blog created by Poly</p>
    <p>
    <p>Already have account <a href="login_page.php">Login Here</a></p>
    <a href="#">Back to top</a>
    </p>
</footer>

<script src="../style/js/jquery-1.11.3.js"></script>
<script src="../style/js/bootstrap.js"></script>
</body>
</html>