<?php
session_start();
 	class User {
        /**
         * The database link
         * @var mysqli object
         */
        private $db = NULL;

        private $uname = "Anonimo";
        private $umoney = 0;
        private $utype = "";

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


        /**
         * Register into the db a new user
         * @param $username
         * @param $emailid
         * @param $password
         * @return bool|mysqli_result
         */
		public function join($username, $emailid, $password){
            //$password = md5($password);
            $qr = mysqli_query($this->db,"INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysqli_error($this->db));
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

			if ($no_rows == 1){
                while($user = $res->fetch_object()){

                    $this->uname = $user->uname;
                    $this->umoney = $user->umoney;
                    $this->utype = $user->utype;

                    $_SESSION['login'] = true;
                    $_SESSION['user']['uname'] = $user->uname;
                    $_SESSION['user']['umoney'] = $user->umoney;
                    $_SESSION['user']['utype'] = $user->utype;
                }
                return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

        public function logout(){
            //session_start();
            session_unset();
            session_destroy();

            $this->uname = "Anonimo";
            $this->umoney = 0;
            $this->utype = "";
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

        public function isLoggedIn(){
            return isset($_SESSION['user']);
        }

        public function getUserName(){
            return $this->uname;
        }

        public function getMoney(){
            return $this->umoney;
        }

        public function getUserType(){
            return $this->utype;
        }

        public function add_flight($flight_id, $num_seats,$price){
            $_SESSION['flights'][$flight_id]['seats'] = $num_seats;
            $_SESSION['flights'][$flight_id]['price'] = $price;
        }

        /**
         * Current user saved flights (fid)
         * @return array
         */
        public function flights_reserved(){
            if(isset($_SESSION['flights'])) {
                return $_SESSION['flights'];
            }
            return array();
        }


	}
?>