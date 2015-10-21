<?php

class Db {
    public $con;
    public function __construct(){
        $server_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db = 'blog';
        $this->con = new mysqli($server_name, $user_name, $password, $db);

        if($this->con->connect_error){
            die('connection failed: ' . $this->con->connect_error);
        }

    }
}
