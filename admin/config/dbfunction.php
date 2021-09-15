<?php  
require_once('database.php');  
//session_start();  
    class dbFunction {  
            
        function __construct() {  
              
            // connecting to database  
            $db = new Databases();  
               
        }  
        // destructor  
        function __destruct() {  
              
        }  
        public function AddPost($title, $author, $photo,$body){  
                
                $qr = mysqli_query($this->db,"INSERT INTO posts (title, author, photo, body) VALUES ('$title','$author','$filename','$body')");  
                return $qr;  
               
        }  
    }
?>