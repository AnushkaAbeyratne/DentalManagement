<?php
class dbConnection{    //create a class name dbConnection
    // to connect database
    public $conn;
    private $hostname="localhost";
    private $username="root";       //username
    private $password="";           //root password
    private $db="mydental_db";      //database name


    function __construct(){       //create a Database Connection
        $this->conn= new mysqli(
        $this->hostname,
        $this->username,
        $this->password,
        $this->db
                );

        if(!$this->conn->connect_error)
        {
            $GLOBALS["con"]=$this->conn;
        }
        else{
            echo "Not Success";
            $GLOBALS["con"]=$this->conn;
        }
    }


}