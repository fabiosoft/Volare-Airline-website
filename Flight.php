<?php

include_once('config.php');
include_once('DateHelper.php');

/**
 * Class Flight
 * Flight manager
 */
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

    /**
     * Get all flights
     * @return array
     */
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

    /**
     * Get lowest prices flight
     * @return array
     */
    public function top_offers($limit = 3){
        $get_lowest_flights_query = "SELECT * FROM fly ORDER BY fprice ASC LIMIT " . $limit ;
        $res = mysqli_query($this->db,$get_lowest_flights_query);
        $no_rows = mysqli_num_rows($res);

        $flights = array();
        while ($flight = $res->fetch_assoc()) {
            array_push($flights, $flight);
        }
        return $flights;
    }

    /**
     * Search specific flight into the db
     * @param $id
     * @return mixed
     */
    public function find($id){
        $find_flight_query = "SELECT * FROM fly WHERE fid = '" . $id ."'";
        $res = mysqli_query($this->db,$find_flight_query);
        $flights = array();
        while ($flight = $res->fetch_assoc()) {
            array_push($flights, $flight);
        }
        return $flights[0];
    }

    /**
     * Remove a flight from the db
     * @param $flight_id
     * @return bool|mysqli_result
     */
    public function delete($flight_id){
        $delete_flight_query = "DELETE FROM fly WHERE fid = " . $flight_id . " LIMIT 1";
        return mysqli_query($this->db,$delete_flight_query);
    }

    /**
     * Update a flight
     * @param $flight_id
     * @param $flight_fday
     * @param $flight_ftsrc
     * @param $flight_ftdst
     * @param $flight_fseat
     * @return bool|mysqli_result
     */
    public function update($flight_id, $flight_fday,$flight_ftsrc,$flight_ftdst,$flight_fseat){
        $update_flight_query = "UPDATE fly SET fday = '" . $flight_fday . "', ftsrc =  '" . $flight_ftsrc .
            "', ftdst = '" . $flight_ftdst . "', fseat =  '" . $flight_fseat . "' WHERE fid = '" . $flight_id . "'";
        return mysqli_query($this->db,$update_flight_query);
    }

    public function add ($flight_departure_name,$flight_arrival_name,$flight_fday,$flight_ftsrc,$flight_ftdst,$flight_fseat,$flight_price){
        $insert_flight_query = "INSERT INTO fly (fsrc,fdst,fday, ftsrc, ftdst, fseat, fprice)" .
            "VALUES ('" . $flight_departure_name . "','" . $flight_arrival_name .  "','" . $flight_fday . "','" . $flight_ftsrc ."','" . $flight_ftdst . "','" . $flight_fseat . "','" . $flight_price . "')";
        echo $insert_flight_query;
        return mysqli_query($this->db,$insert_flight_query);
    }

    /**
     * Tests every input passed from a form and validate every field
     * @param $input_array usually $_POST or $_GET
     * @return array of error messages
     */
    public static function validate($input_array){
        $errors = array();
        $properties_to_check = ['fsrc','fdst','fday','ftsrc','ftdst','fseat','fprice'];

        foreach($properties_to_check as $property){
            if(isset($input_array[$property])){
                $valid = TRUE;
                $field = $input_array[$property];

                switch ($property) {
                    case "fsrc":
                    case "fdst":
                        $valid = (isset($field) and filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => IATA_REGEX)))) & TRUE;
                        break;
                    case "fday":
                        $valid = (isset($field) and filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => DATE_REGEX)))) & TRUE;
                        break;
                    case "ftsrc":
                    case "ftdst":
                        $valid = (isset($field) and filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => TIME_REGEX)))) & TRUE;
                        break;
                    case "fseat":
                        $valid = (isset($field) and $field >= 1 and $field < MAX_SEATS);
                        break;
                    case "fprice":
                        $valid = (isset($field) and filter_var($field, FILTER_VALIDATE_INT)) & TRUE;
                        break;
                }
                if($valid == FALSE){ array_push($errors , $property ." :-: " . $field); }
            }

            //DEBUG - Show every validation output
            //echo  $property . " VALID = " . boolval($valid) . " - field: " . $field ."<br/>";
        }

        return $errors;
    }
}