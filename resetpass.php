<?php 
	require_once('classes/User.php');
	$user = new User();
?>
<?php 
include'inc/header.php';

	$key= $_GET['key'];
	if($_SERVER["REQUEST_METHOD"] == "POST")  {
		$result = $user->resetPassword($key);
		if($result){
			echo "<div class='alert alert-success'>Password is reset.</div>";
			header("Location: register.php"); // Redirect user to index.php
		}
		else{
				echo "<div class='alert alert-danger'>Username/password is incorrect.</div>";
		}			
	}
			
	else{
?>
	<!-- form begin -->
  <div class="row" style="padding-top: 40px;">
  <div class="offset-md-3 col-md-6">
 <div class="card bg-info text-white">
	  <div class="card-header">
	  	<h4 class="card-title text-center">Sign In</h4>
	  </div>
	  <div class="card-body">
		  <form action="" method="post">
		  <!--<div class="form-group">
				  <input type="text" name="username" class="form-control" value="<?php echo $email;?>">
			  </div>-->
			  <div class="form-group">
				  <label for="password">New Password</label>
				  <div class="input-group-append">
				  <input type="password" class="form-control pwd" name="pswd1" id="password"> 
    				<span class="input-group-text" onclick="password_show_hide();">
						<i class="fas fa-eye" id="show_eye"></i>
                  		<i class="fas fa-eye-slash d-none" id="hide_eye"></i>
					</span>	
					</div>	
			  </div>
			  <div class="form-group">
				  <label for="password">Confirm Password</label>
				  <div class="input-group-append">
				  <input type="password" class="form-control pwd" name="pswd2" id="password1"> 
    				<span class="input-group-text" onclick="password_show_hide1();">
						<i class="fas fa-eye" id="show_eye1"></i>
                  		<i class="fas fa-eye-slash d-none" id="hide_eye1"></i>
					</span>	
					</div>	
			  </div>
			  

			  </div>
              <div class="card-footer">
			  	<button type="submit"  class="btn btn-primary" name="submit" style="width: 100%;">Reset</button>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 
	 <?php } ?>

<?php 
	include('inc/footer.php');
 ?>	
 <!--<script>  
function matchPassword() {  
  var pw1 = document.getElementById("pswd1");  
  var pw2 = document.getElementById("pswd2");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully now click on reset button to reset it");  
  }  
}  
</script>  -->