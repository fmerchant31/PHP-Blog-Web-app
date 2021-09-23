<?php 
	session_start();
	require('../classes/Post.php');
	$post = new Post();
	if(isset($_POST['submit']) && isset($_FILES['uploadfile']) ){
		$filename = $_FILES['uploadfile']['name'];
		$tempname = $_FILES["uploadfile"]["tmp_name"];
		if(isset($filename) and !empty($filename)){	
			$folder = "image/" . $filename;
			if(move_uploaded_file($tempname, $folder)){
				$author = mysqli_real_escape_string($this->con, $_POST['author']);
				$post = $post->AddPost($author,$filename);
				if($post)	{
					header('Location: index.php');
					} 
				else	{
					echo "Error" . mysqli_error($conn);
				}
			}
			
		}
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
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input type="text" name="author" class="form-control">
			</div>
			<div class="form-group">
				<label for="exampleFormControlFile1">Add image</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="uploadfile" value=""/>
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-success">
		</form>
	</div>
		
<?php 
	include('inc/footer.php');
 ?>

<script>
	CKEDITOR.replace('body');
</script>