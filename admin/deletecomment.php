<?php
require_once('../classes/Comment.php');
$comment = new Comment();
$id = $_GET['id'];
$id1 = $_GET['id1'];
$query = $comment->DeleteComment($id);
if ($query) {
	header("Location: post.php?id=$id1");
}
