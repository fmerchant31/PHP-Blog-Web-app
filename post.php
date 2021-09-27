<?php
session_start();
require_once('classes/Post.php');
require_once('classes/Comment.php');
$post = new Post();
$comment = new Comment();
$id = $_GET['id'];
$post1 = $post->ShowPost($id);
$post = mysqli_fetch_assoc($post1);
$showComment = $comment->ShowComment($id);
$posts = mysqli_fetch_all($showComment, MYSQLI_ASSOC);
if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$addComment = $comment->AddComment($username, $id);
	if ($addComment) {
		header("location: post.php?id=$id#comment");
	}
}
?>
<?php
include('inc/header.php');
?>
<div class="container">
	<h1><?php echo $post['title']; ?></h1>
	<p>Created On: <?php echo $post['created_at']; ?> by <b> <?php echo $post['author'] ?> </b><br>
		Updated On: <?php echo $post['updated_at']; ?> </p>
	<img src="admin/image/<?php echo $post['photo']; ?>" onclick="window.location.reload(true);" class="figure-img img-fluid rounded" alt="" style="width:500px; height:500px;">

	<p><?php echo $post['body'] ?></p>
	<?php if ($_SESSION['username'] == $post['author']) : ?>
		<hr>
		<a href="editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-info">Edit</a> || <a href="deletepost.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
	<?php endif; ?>
</div>

<div class="container" id="comment">
	<h2 class="text-center">Comments</h2>
	<?php foreach ($posts as $com) : ?>
		<div class="card" style="width: 20rem; margin-left:30%">

			<div class="card-body">
				<div class="card-text"><?php echo $com['comment']; ?></div>
				<div class="card-text"><b><?php echo $com['username']; ?></b>
					<?php if (($com['username']) == ($_SESSION['username'])) : ?>
						<a href="./deletecomment.php?id=<?php echo $com['id']; ?>&id1=<?php echo $_GET['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
					<?php endif; ?>
				</div>


			</div>
		</div><br>
	<?php endforeach; ?>
	<h2 class="text-center">Add Comments</h2>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
		<div class="form-group">

			<input type="text" name="comment" class="form-control" value="" placeholder="Enter your Comment">
		</div>
		<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
		<input type="submit" name="submit" value="Submit" class="btn btn-success">

	</form><br><br>

</div><br><br>



<?php
include('inc/footer.php');
?>