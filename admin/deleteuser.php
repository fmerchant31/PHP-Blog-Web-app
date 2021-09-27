<?php 
	require_once('../classes/User.php');
	$user = new User();
		$id = $_GET['id'];
		$post = $user->DeleteUser($id);
		 if($post){
      header('Location:users.php');	
		}
