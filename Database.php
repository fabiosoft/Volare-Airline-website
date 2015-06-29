<?php

class Database {
    function __construct() {
        // connecting to database
        $this->db = $this->dbConnect();

        if(isset($_SESSION['user'])){
            $this->uname = $_SESSION['user']['uname'];
            $this->umoney = $_SESSION['user']['umoney'];
            $this->utype = $_SESSION['user']['utype'];
            $_SESSION['login'] = true;
        }
    }
    // destructor
    function __destruct() {
        mysqli_close($this->db);
    }

    /**
     * Connect to the mysql database
     * @return mysqli
     */
    private function dbConnect() {
        require_once('config.php');
        $db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if($db->connect_errno > 0){
            // testing the connection
            die ("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
        }
        return $db;
    }


}