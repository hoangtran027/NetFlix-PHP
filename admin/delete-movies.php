<?php
	include ('../config/constants.php'); 


	if (isset($_GET['id']) AND isset($_GET['image_name'])) {
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		if ($image_name != "") {
			$path = "../images/movies/".$image_name;
			$remove = unlink($path);
			if ($remove == False) {
				$_SESSION['remove'] = "<div class='error'>Fail To Delete</div>";
				header('location:'.SITEURL.'admin/manage-movies.php');
				die();
			}
		}
		$sql = "DELETE FROM tbl_movies WHERE id='$id'";
		$res = mysqli_query($conn,$sql);
		if ($res == true) {
			$_SESSION['delete'] = "<div class='success'>Moives Delete Success</div>";
			header('location:'.SITEURL.'admin/manage-movies.php');
		}
		else{
			$_SESSION['delete'] = "<div class='success'>Failed Movies Delete</div>";
			header('location:'.SITEURL.'admin/manage-movies.php');
		}
	}
	else{
		header('location:'.SITEURL.'admin/manage-movies.php');
	}

	


 ?>