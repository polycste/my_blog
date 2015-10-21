<?php
require '../php_library/class_admin.php';
session_start();
if(!isset($_SESSION['username']) ){
    if(!isset($_COOKIE['username'])){
        header('Location: ../frontend/login_page.php') ;
    }
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['username'];
$post = new Admin();
$all_folder = $post->select_all_from_folder_table();
$user_id = $post->user_id_by_username($username);
if(isset($_POST['submit'])){
    if(in_array(null, $_POST)){
       $error = "Title, Post Field Can't be empty";
    }else{
        $message = $post->insert_into_post($_POST);
    }
}
include 'header.php';
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Create a New Post</h1>
        </div>
        <div class="panel-body">
            <form method="post" action="">
                <?php
                    if(isset($error)){
                        echo "<h1 class='alert-warning'> $error </h1>";
                    }
                ?>
                <?php
                if(isset($message)){
                    echo "<h1 class='alert-success'> $message </h1>";
                }
                ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" id="title">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                </div>
                <div class="form-group">
                    <label for="post">Post</label>
                    <textarea rows="15" class="form-control" name="post" placeholder="Enter post" id="post"></textarea>
                </div>
                <div class="form-group">
                    <label for="folder">Select Folder </label>
                    <select class="form-control" name="folder_id">
                        <?php while($folder = $all_folder->fetch_assoc()) { ?>
                        <option value="<?php echo $folder['id'] ?>" <?php if($folder['id'] == 5){echo 'selected';} ?>><?php echo $folder['folder_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Create Post" class="btn btn-lg btn-success">
                </div>
            </form>
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