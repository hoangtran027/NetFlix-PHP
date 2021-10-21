<?php include('partials/menu.php'); ?>

<div class="content">
	<div class="wrapper">
		<h2>Add Category</h2>
		<div class="margin-40"></div>
		<?php 
		if (isset($_SESSION['add'])) {
		 	echo $_SESSION['add'];
		 	unset($_SESSION['add']);
		 }
		 if (isset($_SESSION['upload'])) {
		 	echo $_SESSION['upload'];
		 	unset($_SESSION['upload']);
		 }
		 ?>


		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>
						Title:
					</td>
					<td>
						<input type="text" name="title" placeholder="Category Title">
					</td>
				</tr>
				<tr>
					<td>
						Image :
					</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>
						Featured:
					</td>
					<td>
						<input type="radio" name="featured" value="Yes">Yes
						<input type="radio" name="featured" value="No">No
					</td>
				</tr>
				<tr>
					<td>
						Active:
					</td>
					<td>
						<input type="radio" name="action" value="Yes">Yes
						<input type="radio" name="action" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Category" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>
	</div>
</div>



<?php include('partials/footer.php') ?>

<?php 
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		if (isset($_POST['featured'])) {
			$featured = $_POST['featured'];
		}
		else{
			$featured = "No";
		}
		if (isset($_POST['action'])) {
			$action = $_POST['action'];
		}
		else{
			$action = "No";
		}

		if (isset($_FILES['image']['name'])) {
			$image_name = $_FILES['image']['name'];
				if ($image_name!="") {					
					$ext = end(explode('.',$image_name));

					$image_name = "Movies_Category_".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/category/".$image_name;
					$upload = move_uploaded_file($source_path,$destination_path);
					if ($upload == False) {
						$_SESSION['upload'] = "<div class='error'>Failed To Upload Images.</div>";
						header('location:'.SITEURL.'admin/add-category.php
							');
							die();
					}
				}
		}
		else{
			$image_name = "";
		}



		$sql = "INSERT INTO tbl_category SET 
			title = '$title',
			image_name = '$image_name',
			featured = '$featured',
			action = '$action'
		";


		$res = mysqli_query($conn,$sql);
		if ($res==True) {
			$_SESSION['add'] = "Category Added Successfully";
			header("location:".SITEURL.'admin/manage-category.php');
		}
		else{
			$_SESSION['add'] = "Failed Added Category Successfully";
			header("location:".SITEURL.'admin/add-category.php');
		}




	}
?>