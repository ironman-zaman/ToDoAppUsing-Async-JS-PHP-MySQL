<?php
class Database{
    //DB Params
    private $host = "localhost";
    private $dbName = "booklist";
    private $dbUser = "root";
    private $dbPassword = "";
    private $conn;
    //DB Connect
    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName , $this->dbUser , $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection ERROR: ". $e->getMessage();
        }
        return $this->conn;
    }

}