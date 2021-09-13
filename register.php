<?php 
    require('config/config.php'); 
	require('config/db.php'); 
?>
<?php 
	include'inc/header.php';
	if (isset($_POST['username'])&& isset($_FILES['uploadfile']) ){
			$filename = $_FILES['uploadfile']['name'];
			$tempname = $_FILES["uploadfile"]["tmp_name"];
			if(isset($filename) and !empty($filename)){	
			$folder = "admin/image/" . $filename;
			/*$author = $_SESSION['username'];*/
			$firstname = stripcslashes($_POST['firstname']);// remove backslashes
            $firstame = mysqli_real_escape_string($conn,$firstname);
			$lastname = stripcslashes($_POST['lastname']);// remove backslashes
			$lastname = mysqli_real_escape_string($conn,$lastname);
            $username = stripcslashes($_POST['username']);// remove backslashes
            $username = mysqli_real_escape_string($conn,$username);
            $email = stripcslashes($_POST['email']);
            $email = mysqli_real_escape_string($conn,$email);
            $password = stripslashes($_POST['password']);
		    $password = md5($password);
            $password = mysqli_real_escape_string($conn, $password);
		    $mobile = stripcslashes($_POST['mobile']);// remove backslashes
            $mobile = mysqli_real_escape_string($conn,$mobile);
		    $address = stripcslashes($_POST['address']);// remove backslashes
            $address = mysqli_real_escape_string($conn,$address);

           
			$query2 = "SELECT username,email,mobile FROM users WHERE username='$username' or email='$email' or mobile='$mobile'";
            
		    $result2 = mysqli_query($conn,$query2);
			
			$rows = mysqli_num_rows($result2);
            if($rows>0){
				echo ($rows);
				echo "<div class='alert alert-danger'>Username/email/mobile already exist. Please sign-up with another.</div>";
	        }
			else{
				$query = "Insert into `users`(firstname,lastname,username,email,password,photo,mobile,address) VALUES('$firstname','$lastname','$username','$email','$password','$filename','$mobile','$address')";
				
					
			}
			if (move_uploaded_file($tempname, $folder)) {
				$msg = "Image uploaded successfully";
			}else{
				$msg = "Failed to upload image";
			}
			$result = mysqli_query($conn, $query);
           if ($result) {
           	header("Location:login.php");
           }}
        }else{
?>
	<!-- form begin -->
  <div class="row" style="padding-top: 40px;">
  <div class="offset-md-3 col-md-6">
 <div class="card bg-info text-white">
	  <div class="card-header">
	  	<h4 class="card-title text-center">Registration Here</h4>
	  </div>
	  <div class="card-body">
		  <form action="" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		  <div class="form-row">
				<div class="col-md-4 mb-3">
				<label for="validationDefault01">First name</label>
				<input type="text" class="form-control" id="validationDefault01" name="firstname" required>
				</div>
				<div class="col-md-4 mb-3">
				<label for="validationDefault02">Last name</label>
				<input type="text" class="form-control" id="validationDefault02" name="lastname" required>
				</div>
				<div class="col-md-4 mb-3">
				<label for="validationDefault02">Username</label>
				<input type="text" class="form-control" id="validationDefault02" name="username" required>
				</div>
	   		</div>
			  
			  <div class="form-group">
				  <label for="email">Email</label>
				  <input type="text" class="form-control"  name="email" required>
			  </div>
			  <div class="form-group">
				  <label for="password">Password</label>
				  <div class="input-group-append">
				  <input type="password" class="form-control pwd" name="password" id="password" required> 
    				<span class="input-group-text" onclick="password_show_hide();" required>
						<i class="fas fa-eye" id="show_eye"></i>
                  		<i class="fas fa-eye-slash d-none" id="hide_eye"></i>
					</span>	
					</div>	
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlFile1">Add image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" value="" require/>
			</div>
			  <div class="form-group">
				  <label for="mobile">Mobile Number</label>
				  <input type="text" class="form-control" name="mobile" required>
			  </div>
			  <div class="form-group">
				  <label for="address">Address</label>
				  <input type="text" class="form-control" name="address" required>
			  </div>

			  </div>
			  <div class="card-footer">
			  	<button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">sign Up</button>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 

	 <?php } ?>


<?php 
	include('inc/footer.php');
 ?>	