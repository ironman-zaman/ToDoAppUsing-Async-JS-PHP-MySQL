<?php
//Check to see if the form is submitted correctly
if(isset($_GET['id'])){
    require_once "configs/Database.php";
    require_once "model/Book.php";
    //Instantiate DB & connect
    $database = new Database();
    $dbConn = $database->connect();
    //Instantiate Book object
    $book = new Book($dbConn);
    $book -> id = $_GET['id'];;
    if($book->delete()){
        echo "Success";
    }else{
        echo "Not successful";
    }

}else{
    die;
}