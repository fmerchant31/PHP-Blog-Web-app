<?php 
    require('config/config.php'); 
	require('config/db.php'); 
?>
<?php 
include'inc/header.php';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
        	 $username = stripcslashes($_POST['username']);
        	 $password = stripcslashes($_POST['password']);
 
            $query = "SELECT username FROM users WHERE username='$username' and password='$password'";
            
		    $result = mysqli_query($conn,$query) ;
			//$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
			  
		    //$rows = mysqli_num_rows($result);
            if($result==1){
				session_start();
				$_SESSION['username'] = $username;
				header("Location: index.php"); // Redirect user to index.php
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
			  <div class="form-group">
				  <label for="username">User Name</label>
				  <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control" name="password">
			  </div>
			  <div class="form-group">
				  <a href="forgetpass.php" style="color:white;text-align:center;" name="forget">Forget Password</a>
			  </div>

			  </div>
			  <div class="card-footer">
			  	<button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Sign In</button>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 
	 <?php } ?>

<?php 
	include('inc/footer.php');
 ?>	