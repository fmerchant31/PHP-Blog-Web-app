<?php 
session_start();
	require('config/config.php'); 
	require('config/db.php'); 
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	//create query
	$query = 'SELECT * FROM posts WHERE id ='.$id;

	//get result
	$result = mysqli_query($conn, $query);

	//fetch data
	$post = mysqli_fetch_assoc($result);
	$result = mysqli_query($conn, $query);
	$sql = "SELECT * from comment where post_id=$id";
	$result1 = mysqli_query($conn, $sql) or die (mysqli_error($sql));
	$posts = mysqli_fetch_all($result1, MYSQLI_ASSOC);

	if (isset($_POST['submit'])){
		$comment = stripcslashes($_POST['comment']);// remove backslashes
        $comment = mysqli_real_escape_string($conn,$comment);
		$username = $_SESSION['username'];
		//echo $username;
		$query1 = "Insert into comment (username,comment,post_id) VALUES ('$username','$comment','$id')";
		$result2 = mysqli_query($conn,$query1);
		//if(mysqli_num_rows($result2)){

		

	}

	
    
?>
<?php 
	include('inc/header.php');
?>
	<div class="container">
		<h1><?php echo $post['title']; ?></h1>
		<p>Created On <?php echo $post['created_at']; ?> by <?php  echo $post['author'] ?></p>
		<img src="admin/image/<?php echo $post['photo']; ?>" onclick="window.location.reload(true);" class="figure-img img-fluid rounded" alt="" style="width:500px; height:500px;">
		
		<p><?php echo $post['body'] ?></p>
		<?php if($_SESSION['username']==$post['author']):?>
			<hr>
			<a href="editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-info">Edit</a> || <a href="deletepost.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
		<?php endif; ?>
	</div>
	
	<div class="container">
	<h2 class="text-center">Comments</h2>
	<?php foreach($posts as $com): ?>
		<div class="card"  style="width: 20rem; margin-left:30%">
		
			<div class="card-body">
				<div class="card-text"><?php echo $com['comment']; ?></div>
				<div class="card-text"><b><?php echo $com['username']; ?></b></div>
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
	include ('inc/footer.php');
 ?>