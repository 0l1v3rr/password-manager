<?php 
    class DBConnection {
        protected $host = 'localhost';
        protected $user = 'root';
        protected $password = '';
        protected $database = 'password_manager';

        public $conn = null;

        public function __construct() {
            $this->conn = mysqli_connect($this->host, $this->user, $this->password,$this->database);
            if($this->conn->connect_error) {
                echo "An unknown error occurred.";
            }
        }

        public function closeConnection() {
            if($this->conn != null) {
                $this->conn->close();
                $this->conn = null;
            }
        }

    }
?>