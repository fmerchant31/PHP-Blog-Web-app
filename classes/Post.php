<?php
require_once('Databases.php');
      class Post extends Databases{  
        public function ShowAllPost(){
            $showA = mysqli_query($this->con,"SELECT * FROM posts");
            $show_row_num = mysqli_num_rows($showA);
            return $show_row_num;
        }  
        public function ShowPost($id){
            $show = mysqli_query($this->con,"SELECT * FROM posts WHERE id =$id");
            
            return $show;
        }
        public function ShowPostPagination($start_limit, $results_per_page){
            $pagination = mysqli_query($this->con,"SELECT * FROM posts ORDER BY created_at DESC LIMIT $start_limit, $results_per_page");
            return $pagination;
        }
        public function AddPost($author){  
            $title  = mysqli_real_escape_string($this->con, $_POST['title']);
		    //$author = mysqli_real_escape_string($this->con, $_POST['author']);
		    $body   = mysqli_real_escape_string($this->con, $_POST['body']);
           /*  $filename = $_FILES['uploadfile']['name'];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            if(isset($filename) and !empty($filename)){	
                $folder = "../admin/image/" . $filename;
                if(move_uploaded_file($tempname, $folder)){ */
            $add = mysqli_query($this->con,"INSERT INTO posts (title, author, photo, body) VALUES ('$title','$author','$filename','$body')");  
            return $add;
                
            
        }  
        public function EditPost($author,$filename){
            $update_id = mysqli_real_escape_string($this->con, $_POST['update_id']);
            $title     = mysqli_real_escape_string($this->con, $_POST['title']);
            /* $author    = mysqli_real_escape_string($this->con, $_POST['author']); */
            /* $body      = mysqli_real_escape_string($this->con, $_POST['body']);  
            $filename = $_FILES['uploadfile']['name'];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            if(isset($filename) and !empty($filename)){	
                $folder = "../admin/image/" . $filename;
                if(move_uploaded_file($tempname, $folder)){ */
            $edit = mysqli_query($this->con,"UPDATE posts SET
                                    title  = '$title',
                                    photo  = '$filename',
                                    author = '$author',
                                    body   = '$body'
                            wHERE id     = {$update_id}");
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