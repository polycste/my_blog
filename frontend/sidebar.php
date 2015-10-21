<?php
$folders = $obj->select_all_from_folder();
$users = $obj->select_all_from_user();

?>
<div class="sidebar-module">
    <h4>Folder</h4>
    <ol class="list-unstyled">
        <?php while($row = $folders->fetch_assoc()){ ?>
        <li><a href="folder.php?id=<?php echo $row['id']; ?>"><?php echo $row['folder_name'] ?></a></li>
        <?php } ?>
    </ol>
</div>
<div class="sidebar-module">
    <h4>Author</h4>
    <ol class="list-unstyled">
        <?php while($row = $users->fetch_assoc()){ ?>
            <li><a href="author.php?id=<?php echo $row['id']; ?>"><?php echo $row['first_name'] ?></a></li>
        <?php } ?>
    </ol>
</div>
