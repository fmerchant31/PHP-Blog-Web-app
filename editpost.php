<?php 
	session_start();
	require('classes/Post.php'); 
	$post = new Post();
	if(isset($_POST['submit']) && isset($_FILES['uploadfile'])){
		$filename = $_FILES['uploadfile']['name'];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		$author = $_SESSION['username'];
		if(isset($filename) and !empty($filename)){	
			$folder = "./admin/image/" . $filename;
      if (move_uploaded_file($tempname, $folder)) {
				$msg = "Image uploaded successfully";
			}else{
				$msg = "Failed to upload image";
			}
			$posts = $post->EditPost($author,$filename);
      if($posts){
          header('Location: index.php');
      } else{
        echo "Error";
      }
		}
	}
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$result = $post->ShowPost($id);
		$post = mysqli_fetch_assoc($result);
	}
?>

<?php 
	include'inc/header.php';
?>
	<!-- navbar -->
	<!-- navbar -->
	<div class="container">
		<h2 class="text-center">Add New Post</h2>
		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data"> 
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php  echo $post['title'];?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlFile1">Add image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" value="<?php  echo $post['title'];?>"/>
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" id="body" cols="30" rows="10" class="form-control"> <?php echo $post['body']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="submit" value="Submit" class="btn btn-success">
		</form>
	</div>
		
<?php 
	include('inc/footer.php');
 ?>
 <script>
	CKEDITOR.replace('body');
</script>