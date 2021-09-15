<?php   
 //database.php  
 class Databases{  
      public $con;  
      public $error;  
      public function __construct()  
      {  
          $this->con = mysqli_connect("localhost", "root", "", "simple-blog");  
          if(!$this->con)  
          {  
               echo 'Database Connection Error ' . mysqli_connect_error($this->con);  
          }  
      }
      public function Login($username, $password){

          $qr = mysqli_query($this->con,"SELECT username FROM admin WHERE username='$username' and password='$password'");
          return $qr;

      }

      public function AddPost($title, $author, $filename,$body){  
                
          $qr = mysqli_query($this->con,"INSERT INTO posts (title, author, photo, body) VALUES ('$title','$author','$filename','$body')");  
          return $qr;  
     }  
     public function EditPost($title,$author,$filename,$body,$update_id){
          $qr = mysqli_query($this->con,"UPDATE posts SET
                                   title  = '$title',
                                   photo  = '$filename',
                                   author = '$author',
                                   body   = '$body'
                         WHERE  id     = {$update_id}");
          return $qr;
     }

 }
?>