<?php
    class Config {
        private const servername = "localhost";
        private const db_name = "u299560388_651223";
        private const username = "root";
        private const password = "";
        private $dsn = "mysql:host=" . self::servername . ";dbname=" . self::db_name . '';
        protected $conn = null;

        public function __construct() {
            try {
                $this->conn = new PDO($this->dsn, self::username, self::password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
?>