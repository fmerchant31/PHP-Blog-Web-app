<?php
session_start();
require_once('classes/User.php');
$user = new User();
$result = $user->userProfile();
$post = mysqli_fetch_assoc($result);
?>
<?php
include 'inc/header.php'
?>
<style>
	.row {
		margin-left: 30%;
		/* Added */
		float: none;
		/* Added */
		margin-bottom: 500px;
		/* Added */
	}
</style>
<div class="container">
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
		<div class="row" id="row">

			<!--<div class="alert alert-secondary display" id="example">-->
			<div class="col col-sm-4">
				<div class="card-columns-fluid">
					<div class="card  bg-light" style="width: 22rem; ">
						<img class="card-img-top" src="admin/image/<?php echo $post['photo']; ?>" alt="">
						<div class="card-body">
							<h3 class="card-title text-center"><?php echo $post['username']; ?></h3>

							<p class="card-text"><b>Name:</b> <?php echo $post['firstname'];
																								echo $post['lastname']; ?></p>
							<p class="card-text"><b>Email: </b><?php echo $post['email']; ?></p>
							<p class="card-text"><b>Mobile:</b> <?php echo $post['mobile']; ?></p>
							<p class="card-text"><b>Address:</b> <?php echo $post['address']; ?></p>
							<!--<p class="card-text"></p>-->


						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>