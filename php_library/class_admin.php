<?php
//change this location
require 'C:\xampp\htdocs\training\mini project\blog\php_library\db.php';
class Admin {
    public $db;
    public function __construct(){
        $this->db = new Db();
    }

    //for example
    public function insert(){
        $sql = "INSERT INTO employee(column, column) VALUES ('value1', 'value2')";
        $this->db->con->query($sql);
    }
    public function blog_time_format($time){
        $time = strtotime($time);
        return date('M d, Y', $time);
    }

    public function select_all_from_folder_table(){
        $sql = "SELECT * FROM folder";
        return $this->db->con->query($sql);
    }

    public function insert_into_folder_table($array){
       $folder_name = $array['new_folder'];
        if(!empty($folder_name)){
            $sql = "INSERT INTO folder(folder_name) VALUES ('$folder_name')";
            if($this->db->con->query($sql)){
                header('Location: home.php');
            }
        }
    }

    public function insert_into_post($array){
        $title = mysqli_real_escape_string($this->db->con, $array['title']) ;
        $post = mysqli_real_escape_string($this->db->con, $array['post']) ;
        $user_id = $array['user_id'];
        $folder_id = $array['folder_id'];
        $sql = "INSERT INTO post(title, post, folder_id, user_id) VALUES ('$title', '$post', '$folder_id', '$user_id')";
        if($this->db->con->query($sql)){
            return 'post saved';
        }
    }

    public function fetching_from_post_using_folder_user_id($folder_id, $user_id){
        $sql = "SELECT * FROM post WHERE user_id = '$user_id' AND folder_id = '$folder_id'";
        $result = $this->db->con->query($sql);
        return $result;
    }

    public function user_id_by_username($username) {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->db->con->query($sql);
        $row =  $result->fetch_assoc();
        return $row['id'];
    }

    public function post_from_post_table_by_post_id($id) {
        $sql = "SELECT * FROM post WHERE id = $id";
        $result = $this->db->con->query($sql);
        return $result->fetch_assoc();
    }

    public function update_post ($array) {
       $title = $array['title'];
        $post = $array['post'];
        $post_id = $array['post_id'];
        $folder_id = $array['folder_id'];
        $sql = "UPDATE post SET title = '$title', post = '$post', folder_id = '$folder_id' WHERE id = '$post_id'";
        if($this->db->con->query($sql)){
            header('Location: home.php');
        }
    }

    public function folder_name_by_folder_id($folder_id) {
        $sql = "SELECT * FROM folder WHERE id = $folder_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row['folder_name'];
    }

    public function delete($id) {
        $sql = "DELETE FROM post WHERE id = $id";
        if($this->db->con->query($sql)){
            header('Location: home.php');
        }
    }




}

