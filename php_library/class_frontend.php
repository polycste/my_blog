<?php
//change this location
require 'C:\xampp\htdocs\training\mini project\blog\php_library\db.php';
class Frontend {
    public $db;
    public function __construct(){
        $this->db = new Db();
    }
    
    public function select_all_from_post(){
        $sql = "SELECT *FROM post ORDER BY date DESC";
        $result = $this->db->con->query($sql);
        return $result;
    }
    public function read_more($string, $length = 60){
        $string_array = explode(' ', $string);
        $string_array_length = count($string_array);
        $new_string = "";
        if($length > $string_array_length){
            $length = $string_array_length;
        }
        for($i = 0; $i < $length; $i++){
            $new_string .= $string_array[$i] . ' ';
        }
        return $new_string;
    }
    public function blog_time_format($time){
        $time = strtotime($time);
        return date('M d, Y', $time);
    }

    public function post_from_post_table_using_post_id($id){
       $sql = "SELECT * FROM post WHERE id = $id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function select_all_from_user() {
       $sql = "SELECT * FROM user";
        return  $this->db->con->query($sql);
    }

    public function select_all_from_folder() {
        $sql = "SELECT * FROM folder";
        return  $this->db->con->query($sql);
    }

    public function select_post_from_post_table_by_user_id($id) {
       $sql = "SELECT * FROM post WHERE user_id = $id ORDER BY date DESC";
        return $this->db->con->query($sql);
    }
    public function select_post_from_post_table_by_folder_id($id) {
        $sql = "SELECT * FROM post WHERE folder_id = $id ORDER BY date DESC";
        return $this->db->con->query($sql);
    }
    public function folder_name_by_folder_id($id){
       $sql = "SELECT * from folder WHERE id = $id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row['folder_name'];
    }
    public function user_name_by_user_id($id){
        $sql = "SELECT * from user WHERE id = $id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row['first_name'];
    }
    
    public function insert_into_user_table($array){
        $first_name = $array['first_name'];
        $last_name = $array['last_name'];
        $date_of_birth = $array['date_of_birth'];
        $username = $array['username'];
        $password = $array['password'];
        $sql = "INSERT INTO user (first_name,last_name,date_of_birth,username,password) VALUES ('$first_name','$last_name','$date_of_birth','$username','$password')";
        $this->db->con->query($sql);
    }

    
    public function login_checker($array){
        $username = $array['username'];
        $password = $array['password'];
        $sql = "SELECT username, password FROM user WHERE username = '$username'";
        $result = $this->db->con->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $db_password = $row['password'];
            if($db_password == $password){
                return 1;
            }else{
                return 'you password is wrong';
            }
        } 
		else{
            return 'Username is not exist';
        }
    }
}

