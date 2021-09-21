<?php
    require_once('Databases.php');
    class User extends Databases { 
        public function Login($role){
        $username  = mysqli_real_escape_string($this->con, $_POST['username']);
		$password = mysqli_real_escape_string($this->con, $_POST['password']);
        $password = md5($password);
        $qr = mysqli_query($this->con,"SELECT * FROM users WHERE username='$username' and password = '$password' and roles = $role");
        $row =  mysqli_num_rows($qr);
            if($row){
                $qr = 1;
                return $qr;
            }
        }
        public function EditUser(){
            $update_id = mysqli_real_escape_string($this->con, $_POST['update_id']);
            $firstname = mysqli_real_escape_string($this->con,$_POST['firstname']);
            $lastname = mysqli_real_escape_string($this->con,$_POST['lastname']);
            $username = mysqli_real_escape_strig($this->con,$_POST['username']);
            $email = mysqli_real_escape_string($this->con,$_POST['email']);
            $mobile = mysqli_real_escape_string($this->con,$_POST['mobile']);
            $address = mysqli_real_escape_string($this->con,$_POST['address']);
            $filename = $_FILES['uploadfile']['name'];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            if(isset($filename) and !empty($filename)){	
                $folder = "../admin/image/" . $filename;
                if(move_uploaded_file($tempname, $folder)){
                    $sql = mysqli_query($this->con,"UPDATE users SET
                                                firstname= '$firstname',
                                                lastname = '$lastname',
                                                username = '$username',
                                                email    = '$email',
                                                photo    = '$filename',
                                                mobile   = '$mobile',
                                                address  = '$address'
                                            WHERE  id = {$update_id}");
                    return $sql;
                }
            }
        }
        public function forgetPassword(){
            $sql = mysqli_query($this->con,"SELECT email from users WHERE email='$email'");
            return $sql;
        }
        public function forgetPassword(){
            $password1 = stripcslashes($_POST['pswd1']);
			$password2 = stripcslashes($_POST['pswd2']);
		    if($password1 == $password2){	
				$password2 = md5($password2);
				$query = "UPDATE users SET password='$password2' WHERE email='$key' ";  
				//echo "$query";
				$result = mysqli_query($conn,$query);
                return $result;
                
            }
        }

				//echo "$result";
        public function ShowAllUser(){
            $sql = mysqli_query($this->con,"SELECT * FROM users");
            return $sql;
        }
        public function SelectUser($id){
            $sql = mysqli_query($this->con,"SELECT * FROM users WHERE id =$id");
            return $sql;
        }
        public function DeleteUser($id){
            $sql = mysqli_query($this->con,"DELETE FROM users WHERE id='$id'");
            return $sql;
        }
        public function Logout(){
            session_start();
            session_unset();
            session_destroy();
            header('location:index.php');
        }
    }
    GLOBAL $user;
    $user = new User();
?>