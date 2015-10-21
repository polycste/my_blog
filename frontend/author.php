<?php
require '../php_library/class_frontend.php';
$id = 1;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$obj = new Frontend();
$posts = $obj->select_post_from_post_table_by_user_id($id);
$username = $obj->user_name_by_user_id($id);
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php
            if($posts->num_rows == 0){
                echo "<h2>No post found by this Author";
            }else{
                echo "<h1>Showing posts written by $username </h1> <hr><br>";
            }
            while($post = $posts->fetch_assoc()){

                ?>
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href= "post.php?id=<?php echo $post['id'] ;?>"><?php   echo $post['title'] ?></a>
                    </h2>
                    <p class="blog-post-meta"><?php  echo $obj->blog_time_format( $post['date'] ) ?>  by <a href="author.php?id=<?php echo $post['user_id'] ?>"> <?php echo $obj->user_name_by_user_id($post['user_id'])  ?> </a></p>
                    <p> <?php  echo $obj->read_more( $post['post'] ) ?>  </p>
                    <P> <a href= "post.php?id=<?php echo $post['id'] ;?>" class="btn btn-success"> Readmore </a> </P>
                </div><!-- /.blog-post -->
                <br>
                <br>
            <?php } ?>
        </div><!-- /.blog-main -->
        <!--        Side bar    -->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Don't have Account</h4>
                <a class="btn btn-primary btn-lg" href="registration_page.php">Register Here</a><br>
            </div>
            <?php include 'sidebar.php' ;?>
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