<?php 
	require_once('../classes/Comment.php')
		// get from data
		$id = $_GET['id'];
		$id1 = $_GET['id1'];);	
	   $query = $comment->DeleteComment($id);
	   if($query){
	   	header("Location: index.php");	
	   }
?>