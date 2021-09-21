<?php 
    session_start();
   // require('config/config.php'); 
	//require('config/db.php'); 
	require('../classes/User.php'); 
	/*$funObj = new User();	
	if(isset($_POST['submit']) && isset($_FILES['uploadfile'])){
		$filename = $_FILES['uploadfile']['name'];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		if(isset($filename) and !empty($filename)){	
		$folder = "image/" . $filename;
            
		/*$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
           // remove backslashes
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
           
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        
         //$password = mysqli_real_escape_string($conn, $_POST['password']);
        //$password = md5($password);
      
            $query = "UPDATE users SET
                        firstname= '$firstname',
                        lastname = '$lastname',
                        username = '$username',
                        email    = '$email',
						photo    = '$filename',
                        mobile   = '$mobile',
                        address  = '$address'
                WHERE  id = {$update_id}";
        
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}*/
		$post = $user->EditUser();
        if($post){
            header('Location: index.php');
        } else{
            echo "Error" . mysqli_error($conn);
        }
	}
	}
	//get id
	$id = $_GET['id'];
	//create query
	//$query = "SELECT * FROM users WHERE id =$id";

	//get result
	//$result = mysqli_query($conn, $query);
	$result = $user->SelectUser($id);
	//fetch data
	$post = mysqli_fetch_assoc($result);
?>
<?php
    include'inc/header.php';
?>
	<!-- form begin -->
  <div class="row" style="padding-top: 40px;">
  <div class="offset-md-3 col-md-6">
 <div class="card bg-info text-white">
	  <div class="card-header">
	  	<h4 class="card-title text-center">Update Here</h4>
	  </div>
	  <div class="card-body">
		  
          <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data"> 
          <div class="form-group">
		  <div class="form-row">
				<div class="col-md-4 mb-3">
				<label for="validationDefault01">First name</label>
				<input type="text" class="form-control" id="validationDefault01" name="firstname" value="<?php  echo $post['firstname'];?>" required>
				</div>
				<div class="col-md-4 mb-3">
				<label for="validationDefault02">Last name</label>
				<input type="text" class="form-control" id="validationDefault02" name="lastname" value="<?php  echo $post['lastname'];?>" required>
				</div>
				<div class="col-md-4 mb-3">
				<label for="validationDefault02">Username</label>
				<input type="text" class="form-control" id="validationDefault02" name="username" value="<?php  echo $post['username'];?>" required>
				</div>
	   		</div>
			  <div class="form-group">
				  <label for="email">Email</label>
				  <input type="text" class="form-control"  name="email" value="<?php  echo $post['email'];?>">
			  </div>
			  <!--<div class="form-group">
				  <label for="password">Password</label>
				  <div class="input-group-append">
				  <input type="password" class="form-control pwd" name="password" id="password" value=" 
    				<span class="input-group-text" onclick="password_show_hide();">
						<i class="fas fa-eye" id="show_eye"></i>
                  		<i class="fas fa-eye-slash d-none" id="hide_eye"></i>
					</span>	
					</div>	 
                </div>-->
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlFile1">Add image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" value="<?php  echo $post['photo'];?>" require/>
			</div>
              <div class="form-group">
				  <label for="mobile">Mobile Number</label>
				  <input type="text" class="form-control" name="mobile" value="<?php  echo $post['mobile'];?>" required>
			  </div>
			  <div class="form-group">
				  <label for="address">Address</label>
				  <input type="text" class="form-control" name="address" value="<?php  echo $post['address'];?>" required>
			  </div>
              <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			  <div class="card-footer">
			  	<button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Update</button>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 

	 


<?php 
	include('inc/footer.php');
 ?>	