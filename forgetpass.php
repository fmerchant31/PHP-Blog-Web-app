<?php 
	require_once('classes/User.php');
?>
<?php 
include'inc/header.php';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
        	$email = stripcslashes($_POST['email']);
			$query = $user->forgetPassword($email);
            if($query){
				require_once('PHPMailer/src/PHPMailer.php');
				include_once "PHPMailer/src/Exception.php";
				require 'PHPMailer/src/SMTP.php';
				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->CharSet =  "utf-8";
				$mail->isSMTP();
				// enable SMTP authentication
				$mail->SMTPAuth = true;                  
				// GMAIL username
				$mail->Username = "fatemamerchant31@gmail.com";
				// GMAIL password
				$mail->Password = "vunbonqicpdkkgyz";
				$mail->SMTPSecure = "tsl";  
				// sets GMAIL as the SMTP server
				$mail->Host = "smtp.gmail.com;smtp.qed42.com";
				// set the SMTP port for the GMAIL server
				$mail->Port = "587";
				$mail->From='fatemamerchant31@gmail.com';
				$mail->FromName="Fa's Blog";
				$mail->AddAddress($email);
				$mail->Subject  =  'Reset Password';
				$mail->IsHTML(true);
				$mail->Body    = "Hii,<br>Click On This Link to Reset Password <br><br> http://localhost/php-blog-web-app/resetpass.php?key=$email <br> <br><b>Please do not share this link.</b><br><br><br>Thank you,<br>Fa's Blog.";
				if($mail->Send())
				{
					echo "<div class='alert alert-success'>Mail is send to '$email' for resetting the password.</div>";
				}
				else
				{
				echo "Mail Error - >".$mail->ErrorInfo;
				}
  			}else{
				echo "<div class='alert alert-danger'>Enter registered Mail ID!</div>";
			  }}
		else{
?>
	<!-- form begin -->
  <div class="row" style="padding-top: 40px;">
  <div class="offset-md-3 col-md-6">
 <div class="card bg-info text-white">
	  <div class="card-header">
	  	<h4 class="card-title text-center">Email</h4>
	  </div>
	  <div class="card-body">
		  <form action="" method="post">
		  <div class="form-group">
				  <input type="hidden" name="username" class="form-control" value="<?php echo $username;?>">
			  </div>
			  <div class="form-group">
				  <label for="username">Registered Email</label>
				  <input type="text" class="form-control" name="email">
			  </div>
			  

			  </div>
			  <div class="card-footer">
			  	<button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Submit</button>
			  </div>
		  </form> <!-- form end -->
	  </div>  <!-- card end -->
	</div>
	 </div> 
	 <?php } ?>

<?php 
	include('inc/footer.php');
 ?>	