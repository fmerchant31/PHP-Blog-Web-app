<?php 
 session_start();
    //require('config/config.php'); 
	//require('config/db.php');
	require_once('classes/Post.php');  
	//$data = new Databases;  

	//create query
	$results_per_page=3;
	$num_of_rows = $post->ShowAllPost();
	//$result = mysqli_query($conn, $sql);
	if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
	$i=0;
	//$num_of_rows = mysqli_num_rows($result);
	$total_pages=ceil($num_of_rows/$results_per_page);
	$start_limit=($page-1)*$results_per_page;
	//$query = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $start_limit, $results_per_page";
		$query = $post->ShowPostPagination($start_limit, $results_per_page);
	//get result
	//$result = mysqli_query($conn, $query) or die (mysqli_error($query));
	

	//fetch data
	$posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
	

?>

<?php 
	require'inc/header.php';
?>
	<!-- navbar -->
	<!-- navbar -->
	<style>.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}

.carousel,.item,.active{height:100%;}
.carousel-inner{height:100%;}</style>
<br>

		<div class="container"> 
	<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
	<img src="./bg/3.png" alt="Los Angeles" width="100%" height="100%">
  </div>
  <div class="carousel-item">
	<img src="./bg/1.png" alt="Chicago" width="1100" height="100%">
  </div>
  <div class="carousel-item">
	<img src="./bg/2.png" alt="New York" width="1100" height="100%">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

		
		<h2 class="text-center">Blog Posts</h2>
		
			<div class="row" id="row">
		<?php foreach($posts as $post): ?>
			<!--<div class="alert alert-secondary display" id="example">-->
			<div class="col col-sm-4">
    		<div class="card-columns-fluid">
			<div class="card  bg-light" style = "width: 22rem; " >
			<img class="card-img-top" src="admin/image/<?php echo $post['photo']; ?>" alt="">
			<div class="card-body">
				<h3 class="card-title"><?php echo $post['title']; ?></h3>
				
				<p class="card-text">Created On <?php echo $post['created_at']; ?> by <?php  echo $post['author'] ?></p>
				<!--<p class="card-text"></p>-->
				<?php if(isset($_SESSION['username'])==true):?>
					<a class="btn btn-info" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
				<?php endif; ?>
			</div></div></div></div>
		<?php endforeach ?>
	</div></div>
	<?php  $prev = $page - 1;
  		$next = $page + 1; 
 	 ?>
  <nav class="mt-5">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item <?php if($page <=1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page < 1){ echo '#'; } else { echo "index.php?page=".$prev; } ?>">Previous</a>
                </li>

                <?php for($i = 1; $i <= $total_pages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>

                <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $total_pages){ echo '#'; } else {echo "index.php?page=$next"; } ?>">Next</a>
                </li>
            </ul>
        </nav>
		
		
<?php 
	include('inc/footer.php');
 ?>