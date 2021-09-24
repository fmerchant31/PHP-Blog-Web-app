<?php
    require_once('Databases.php');
    class User extends Databases { 
      public function register($filename){
        $firstname = stripcslashes($_POST['firstname']);// remove backslashes
        $firstame = mysqli_real_escape_string($this->con,$firstname);
      	$lastname = stripcslashes($_POST['lastname']);// remove backslashes
      	$lastname = mysqli_real_escape_string($this->con,$lastname);
        $username = stripcslashes($_POST['username']);// remove backslashes
        $username = mysqli_real_escape_string($this->con,$username);
        $email = stripcslashes($_POST['email']);
        $email = mysqli_real_escape_string($this->con,$email);
        $password = stripslashes($_POST['password']);
        $password = md5($password);
        $password = mysqli_real_escape_string($this->con, $password);
        $mobile = stripcslashes($_POST['mobile']);// remove backslashes
        $mobile = mysqli_real_escape_string($this->con,$mobile);
        $address = stripcslashes($_POST['address']);// remove backslashes
        $address = mysqli_real_escape_string($this->con,$address);
        if(array_key_exists('phoneNumber', $_POST))
        { 
            if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $mobile))
            {
                $error = "<div class='alert alert-danger'>Invalid phone number</div>";
            }
        }
        $qr = mysqli_query($this->con,"SELECT username,email,mobile FROM users WHERE username='$username' or email='$email' or mobile='$mobile'");
        $rows = mysqli_num_rows($qr);
        if($rows>0){
    	    echo "<div class='alert alert-danger'>Username/email/mobile already exist. Please sign-up with another.</div>";
        }
      	else{
      		$query = mysqli_query($this->con,"Insert into `users`(firstname,lastname,username,email,password,photo,mobile,address) VALUES('$firstname','$lastname','$username','$email','$password','$filename','$mobile','$address')");		
            return $query;
        }
      }
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
      public function userProfile(){
          $username = mysqli_real_escape_string($this->con, $_GET['username']);
          $sql = mysqli_query($this->con,"SELECT * FROM users WHERE username= '{$username}'");
          return $sql;
      }
      public function EditUser($filename){
          $update_id = mysqli_real_escape_string($this->con, $_POST['update_id']);
          $firstname = mysqli_real_escape_string($this->con,$_POST['firstname']);
          $lastname = mysqli_real_escape_string($this->con,$_POST['lastname']);
          $username = mysqli_real_escape_string($this->con,$_POST['username']);
          $email = mysqli_real_escape_string($this->con,$_POST['email']);
          $mobile = mysqli_real_escape_string($this->con,$_POST['mobile']);
          $address = mysqli_real_escape_string($this->con,$_POST['address']);
          
              if(!preg_match('/^[0-9]{10-10}\z/', $mobile)){
                echo "<div class='alert alert-danger'>Invalid Mobile number</div>";
              }
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
      public function forgetPassword($email){
          $sql = mysqli_query($this->con,"SELECT email from users WHERE email='$email'");
          return $sql;
      }
      public function resetPassword($key){
        $password1 = stripcslashes($_POST['pswd1']);
      	$password2 = stripcslashes($_POST['pswd2']);
        if($password1 == $password2){	
    	$password2 = md5($password2);
    	$query = mysqli_query($this->con,"UPDATE users SET password='$password2' WHERE email='$key' ");  
            return $query;
        }else{
            echo "<div class='alert alert-danger'>New Password and confirm password are not same</div>";
        }
      }
      
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
 
    
