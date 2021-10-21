<?php 
	if (!isset($_SESSION['user'])) {
		$_SESSION['no-login-message'] = "<div class='error'>Please Login To Access Login Panel</div>";
		header('location:'.SITEURL.'admin/login.php');
	}

 ?>