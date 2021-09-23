<?php
require_once('Databases.php');
    class Post extends Databases{  
      public function ShowAllPost(){
          $showA = mysqli_query($this->con,"SELECT * FROM posts");
          $show_row_num = mysqli_num_rows($showA);
          return $show_row_num;
      }  
      public function ShowPost($id){
          $post = mysqli_query($this->con,"SELECT * FROM posts WHERE id=$id");
          return $post;
      }
      public function ShowPostPagination($start_limit, $results_per_page){
          $pagination = mysqli_query($this->con,"SELECT * FROM posts ORDER BY created_at DESC LIMIT $start_limit, $results_per_page");
          return $pagination;
      }
      public function AddPost($author,$filename){  
        $title  = mysqli_real_escape_string($this->con, $_POST['title']);
	    $body   = mysqli_real_escape_string($this->con, $_POST['body']);
        $add = mysqli_query($this->con,"INSERT INTO posts (title, author, photo, body) VALUES ('$title','$author','$filename','$body')");  
        return $add;
              
          
      }  
      public function EditPost($author,$filename){
          $update_id = mysqli_real_escape_string($this->con, $_POST['update_id']);
          $title     = mysqli_real_escape_string($this->con, $_POST['title']);
          $body      = mysqli_real_escape_string($this->con, $_POST['body']);  
          $edit = mysqli_query($this->con,"UPDATE posts SET
                                  title  = '$title',
                                  photo  = '$filename',
                                  author = '$author',
                                  body   = '$body',
                                  updated_at = now()
                          WHERE id     = {$update_id}");
          return $edit;      
      }
      public function DeletePost($id){
          $delete = mysqli_query($this->con,"DELETE FROM posts WHERE id='$id'");
          return $delete;
      }

    }
GLOBAL $post;
$post = new Post();
?>