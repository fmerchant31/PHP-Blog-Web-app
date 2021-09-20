<?php
    class Databases {  
      public $con;    
      public $error;  
      public function __construct()  
      {  
          $this->con = mysqli_connect("localhost", "root", "", "simple-blog"); 
         // return $this->con; 
          if(!$this->con)  
          {  
               echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
          }  
      }
    }
  
  GLOBAL $db;
  $db = new Databases();
  ?>