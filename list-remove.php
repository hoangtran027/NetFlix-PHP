<?php
	include ('config/constants.php'); 


	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		if ($image_name != "") {
			$path = "images/movies/".$image_name;
			$remove = unlink($path);
		}
		$sql = "DELETE FROM tbl_mylist WHERE id='$id'";
		$res = mysqli_query($conn,$sql);
		header('location:'.SITEURL);
	}

 ?>