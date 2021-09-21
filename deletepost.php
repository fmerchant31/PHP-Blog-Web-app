<?php 
	require_once('classes/Post.php');
	$id = $_GET['id'];
	$post = $post->DeletePost($id);
	if($post){
     	header('Location:index.php');	
	}
?>