<?php
 require_once "configs/Database.php";
 require_once "model/Book.php";
 $data = array();
 //Instantiate DB & connect
 $database = new Database();
 $dbConn = $database->connect();
 //Instantiate Leads object
 $book = new Book($dbConn);

 //Blog post query
$result = $book->read();

//Get row count
$num = $result->rowCount();
if($num>0){
while($row = $result->fetch(PDO::FETCH_ASSOC)){
array_push($data,$row);
}
}
$data = json_encode($data);
echo $data;
?>