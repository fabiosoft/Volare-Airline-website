<?php
session_start();
 	class User {
        /**
         * The database link
         * @var mysqli object
         */
        private $db = NULL;

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
                die ("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
            }
            return $db;
        }


        /**
         * Register into the db a new user
         * @param $username
         * @param $emailid
         * @param $password
         * @return bool|mysqli_result
         */
		public function join($username, $emailid, $password){
            //$password = md5($password);
            $qr = mysqli_query($this->db,"INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysqli_error());
            return $qr;
			 
		}

        /**
         * Login an already registred user
         * @param $uname
         * @param $password
         * @return bool
         */
		public function login($uname, $password){
            $get_logged_user_query = "SELECT * FROM usr WHERE uname = '".$uname."' AND upwd = '". $password . "' LIMIT 1";
			$res = mysqli_query($this->db,$get_logged_user_query);
			//$user_data = mysqli_fetch_array($res);
			//print_r($user_data);
			$no_rows = mysqli_num_rows($res);

			if ($no_rows == 1)
			{
		        print_r($_SESSION);

				/*
				$_SESSION['login'] = true;
				$_SESSION['uid'] = $user_data['id'];
				$_SESSION['username'] = $user_data['username'];
				$_SESSION['email'] = $user_data['emailid'];
				*/
				return TRUE;
			}
			else
			{
				return FALSE;
			}


		}

        /**
         * Verify if a user already exists into the db
         * @param $uname
         * @return bool
         */
		public function isUserExist($uname){
			$qr = mysqli_query($this->$db,"SELECT * FROM usr WHERE uname = '".$uname."'");
			echo $row = mysqli_num_rows($qr);
			if($row > 0){
				return true;
			} else {
				return false;
			}
		}
	}
?>