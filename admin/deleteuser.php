<?php 
	require_once('../classes/User.php');
		$id = $_GET['id'];
		$post = $user->DeleteUser($id);
		 if($post){
        	header('Location:users.php');	
		}
?>