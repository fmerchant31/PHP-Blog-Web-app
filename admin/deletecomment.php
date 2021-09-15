<?php 
   	require('config/config.php'); 
	require('config/db.php'); 
	
		// get from data
		$id = $_GET['id'];
		$id1 = $_GET['id1'];
 		$query = mysqli_query($conn, "DELETE FROM comment WHERE id='$id'");
       // header("Location: post.php?id=$id");	
	   header("Location: index.php");	
?>