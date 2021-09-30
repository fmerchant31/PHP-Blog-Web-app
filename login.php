<?php
require_once('classes/User.php');
require_once('classes/Post.php');
$post = new Post();
$user = new User();
?>
<?php
include 'inc/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$role = 0;
	$post = $user->Login($role);
	$username = stripslashes($_REQUEST['username']);
	if ($post) {
		session_start();
		$_SESSION['username'] = $username;
		header("Location: index.php"); // Redirect user to index.php
	} else {
		echo "<div class='alert alert-danger'>Username/password is incorrect.</div>";
	}
} else {
?>
	<head>
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css?v=2">
</head>
	<div class="center-item">
		<form action="" method="post">
			<input type="text" placeholder="Enter username" name="username" require>
			
			<div class="input-group-append" >
			<input type="password" placeholder="Enter password" name="password" id="password" require>
			<span  onclick="password_show_hide();" style="padding-top:35px; padding-left:10px;" \>
					<i class="fas fa-eye" id="show_eye" ></i>
					<i class="fas fa-eye-slash d-none" id="hide_eye"></i>
			</span>
</div> 
			<button type="submit" name="submit">Login</button>
			<p><a href="forgetpass.php">Forget Password?</a></p>
		</form>

	</div>
</body>

<?php } ?>

<?php
include('inc/footer.php');
?>