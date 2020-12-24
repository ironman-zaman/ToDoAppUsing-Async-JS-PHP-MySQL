<?php
class Book{
    //DB Stuff
    private $conn;
    private $table = 'books';
    //Store form fields as properties
    public $title;
    public $author;
    public $isbn;
    public $id;

    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

     //Create Book
     public function create(){
        //Create Query
        $query = 'INSERT INTO '. $this->table . '
        SET 
         title = :title,
         author = :author,
         isbn = :isbn
         ';

         //Prepare statements
         $stmt = $this->conn->prepare($query);

         //Clean data
         $this->title = htmlspecialchars(strip_tags($this->title));
         $this->author = htmlspecialchars(strip_tags($this->author));
         $this->isbn = htmlspecialchars(strip_tags($this->isbn));

        //Bind data
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':author',$this->author);
        $stmt->bindParam(':isbn',$this->isbn);
        

        //Execute Query
        if($stmt->execute()){
            return true;
        }

        //Print error if something goes wrong
        printf("Error %s.'\n",$stmt->error);

    }

    //Get Books
    public function read(){
    //Create the query
    $query = 'SELECT * FROM '.$this->table;

    //prepare statements
    $stmt = $this->conn->prepare($query);
    //Execute
    if($stmt->execute()){
        return $stmt;
    }
    //Print error if something goes wrong
    printf("Error %s.'\n",$stmt->error);
    }

    public function delete(){
    //Create the query
    $query = 'DELETE  FROM '.$this->table.' WHERE id= '.$this->id;

    //prepare statements
    $stmt = $this->conn->prepare($query);
    //Execute
    if($stmt->execute()){
        return $stmt;
    }
    //Print error if something goes wrong
    printf("Error %s.'\n",$stmt->error);
    }
}