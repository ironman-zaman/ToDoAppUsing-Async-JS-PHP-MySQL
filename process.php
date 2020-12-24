<?php
//Check to see if the form is submitted correctly
if(isset($_POST['title']) && 
isset($_POST['author']) &&
isset($_POST['isbn'])){
    require_once "configs/Database.php";
    require_once "model/Book.php";
    //Instantiate DB & connect
    $database = new Database();
    $dbConn = $database->connect();
    //Instantiate Book object
    $book = new Book($dbConn);
    $book -> title = $_POST['title'];
    $book -> author = $_POST['author'];
    $book -> isbn = $_POST['isbn'];
    if($book->create()){
        echo "Success";
    }else{
        echo "Not successful";
    }

}else{
    die;
}