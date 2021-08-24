<?php 
    require('config/config.php'); 
	require('config/db.php'); 
?>
<?php 
include'inc/header.php';

	$key= $_GET['key'];
//echo "$key";
	if($_SERVER["REQUEST_METHOD"] == "POST")  {
				
			$password1 = stripcslashes($_POST['pswd1']);
			$password2 = stripcslashes($_POST['pswd2']);
			
            
				if($password1 == $password2)
				{	
				$query = "UPDATE users1 SET password='$password2' WHERE email='$key' ";  
				//echo "$query";
				$result = mysqli_query($conn,$query) ;
				//echo "$result";
					
					if($result){
						echo "<div class='alert alert-success'>Password is reset.</div>";
						//header("Location: register.php"); // Redirect user to index.php
					}
					else{
							echo "<div class='alert alert-danger'>Username/password is incorrect.</div>";
							
					}
				}
				else{
					echo "<div class='alert alert-danger'>New Password and confirm password are not same</div>";
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
				  <input type="password" class="form-control" name="pswd1">
			  </div>
			  <div class="form-group">
				  <label for="password">Confirm Password</label>
				  <input type="password" class="form-control"  name="pswd2">
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