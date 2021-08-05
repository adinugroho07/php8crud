<?php 

Class Connection {
    
    public String $host;
    public String $username;
    public String $password;
    public String $dbname;
    private $db;


    public function __construct(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "php8crud";
        $this->setDb(new mysqli($this->host, $this->username, $this->password,$this->dbname));
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }
    }

    private function setDb($db){
        $this->db = $db;
    }

    public function getDb(){
        return $this->db;
    }

}