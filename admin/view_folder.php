<?php
require '../php_library/class_admin.php';

session_start();
if(!isset($_SESSION['username']) ){
    if(!isset($_COOKIE['username'])){
        header('Location: ../frontend/login_page.php') ;
    }
}
if(isset($_SESSION['cookie'])){
    setcookie('username', $_SESSION['username'], time()+3600);
}

$post = new Admin();
$folder_id = $_GET['id'];
$folder_name = $post->folder_name_by_folder_id($folder_id);
$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['username'];
$user_id = $post->user_id_by_username($username);
$result = $post->fetching_from_post_using_folder_user_id($folder_id, $user_id);
include 'header.php';
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Folder :: <?php echo  $folder_name ?></h1>
        </div>
        <div class="panel-body">
            <?php
            if($result->num_rows == 0){
                echo "<p class='alert alert-info'>You didn't keep any post in this folder</p>";
            }

            ?>
            <table class="table table-striped">
                <!--available -- table class =    .table-striped, .table-bordered, .table-hover, .table-condensed-->
                <!--available -- contextual tr class = active, success, warning, danger, info-->
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Published On</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><a href="edit_post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></td>
                    <td><?php echo $post->blog_time_format($row['date']) ?></td>
                    <td><a href="edit_post.php?id=<?php echo $row['id'] ?>">Edit</a> | <a onclick="return check_delete()"  href="delete_post.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer class="blog-footer">
    <p>Blog created by Poly.</p>
</footer>
<script src="../style/js/jquery-1.11.3.js"></script>
<script src="../style/js/bootstrap.js"></script>
</body>
</html>