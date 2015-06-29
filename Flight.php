<?php

class Flight {
    function __construct() {
        // connecting to database
        $this->db = $this->dbConnect();
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


    public function index(){
        $get_all_flights_query = "SELECT * FROM fly";
        $res = mysqli_query($this->db,$get_all_flights_query);
        $no_rows = mysqli_num_rows($res);

        $flights = array();
        while ($flight = $res->fetch_assoc()) {
            array_push($flights, $flight);
        }
        return $flights;
    }
}