<?php
require '../php_library/class_admin.php';

session_start();
if(!isset($_SESSION['username']) ){
    if(!isset($_COOKIE['username'])){
        header('Location: ../frontend/login_page.php') ;
    }
}
if(isset($_SESSION['cookie']) == 'enable'){
    setcookie('username', $_SESSION['username'], time()+3600);
}

$post = new Admin();
$all_folder = $post->select_all_from_folder_table();
if(isset($_POST['submit'])){
    $post->insert_into_folder_table($_POST);
}
include 'header.php';
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Folder</h1>
        </div>
        <div class="panel-body">
            <ul>
                <?php while($folder = $all_folder->fetch_assoc()) {?>
                <li><a href="view_folder.php?id=<?php echo $folder['id'] ?>"><?php echo $folder['folder_name'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="new_folder">Create a New folder</label>
            <input type="text" name="new_folder" id="new_folder" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="create folder">
        </div>
    </form>
    <h1><a href="new_post.php" class="btn btn-lg btn-primary">Create a New Post</a></h1>
</div>

<footer class="blog-footer">
    <p>Blog created by poly</p>
</footer>

<script src="../style/js/jquery-1.11.3.js"></script>
    <script src="../style/js/bootstrap.js"></script>
</body>
</html>