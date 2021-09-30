<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Simple Blog</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	
</head>
<body>
<script>
	function password_show_hide() {
			var x = document.getElementById("password");
			var show_eye = document.getElementById("show_eye");
			var hide_eye = document.getElementById("hide_eye");
			hide_eye.classList.remove("d-none");
			if (x.type === "password") {
				x.type = "text";
				show_eye.style.display = "none";
				hide_eye.style.display = "block";
			} else {
				x.type = "password";
				show_eye.style.display = "block";
				hide_eye.style.display = "none";
			}
			}

			function password_show_hide1() {
			var x = document.getElementById("password1");
			var show_eye = document.getElementById("show_eye1");
			var hide_eye = document.getElementById("hide_eye1");
			hide_eye.classList.remove("d-none");
			if (x.type === "password") {
				x.type = "text";
				show_eye.style.display = "none";
				hide_eye.style.display = "block";
			} else {
				x.type = "password";
				show_eye.style.display = "block";
				hide_eye.style.display = "none";
			}
			}
</script>
	
<?php include('navbar.php'); ?>