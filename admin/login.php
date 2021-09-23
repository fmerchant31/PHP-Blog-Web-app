<?php 
	require_once('../classes/User.php');
	require_once('../classes/Post.php');
	$post = new Post();
?>
<?php 
	include'inc/header.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
		 $role=1;
		 $post = $user->Login($role);
		 $username = stripslashes($_REQUEST['username']);
        if($post==1){
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
				  <input type="text" class="form-control" name="username" require>
			  </div>
			  <div class="form-group">
				  <label for="password">Password</label>
				  <div class="input-group-append">
				  <input type="password" class="form-control pwd" name="password" id="password" require> 
    				<span class="input-group-text" onclick="password_show_hide();">
						<i class="fas fa-eye" id="show_eye"></i>
                  		<i class="fas fa-eye-slash d-none" id="hide_eye"></i>
					</span>	
					</div>	 
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