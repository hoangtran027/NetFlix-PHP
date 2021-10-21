<?php include('partials/menu.php'); ?>
<div class="content">
	<div class="wrapper">
		<h1>Update Category</h1>
		<br>

		<?php 
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$sql = "SELECT * FROM tbl_category WHERE id='$id'";
				$res = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($res);
				if ($count == 1) {
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$current_image = $row['image_name'];
					$featured = $row['featured'];
					$active = $row['action'];

				}
				else{
					$_SESSION['no-category-found'] = "<div class='errod'>Category Not Found</div>";
					header('location:'.SITEURL.'admin/manage-category.php');
				}
			}
			else{
				header('location:'.SITEURL.'admin/manage-category.php');
			}

		 ?>


		<br>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title :</td>
					<td>
						<input type="text" name="title" value="<?php echo $title; ?>">
					</td>
				</tr>
				<tr>
					<td>Current Images: </td>
					<td>
						<?php 
							if ($current_image != "") {
								?>
								<img src="<?php echo SITEURL ?>images/category/<?php echo $current_image; ?>" style="width: 100px;">
								<?php
							}
							else{

							}
						 ?>
						
					</td>
				</tr>
				<tr>
					<td>New Images: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Featured: </td>
					<td>
						<input <?php if ($featured == "Yes") {
							echo "checked";
						} ?> type="radio" name="featured" value="Yes">Yes
						<input <?php if ($featured == "No") {
							echo "checked";
						} ?> type="radio" name="featured" value="No">No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input <?php if ($active == "Yes") {
							echo "checked";
						} ?> type="radio" name="action" value="Yes">Yes
						<input <?php if ($active == "No") {
							echo "checked";
						} ?> type="radio" name="action" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $current_image; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
				</tr>

			</table>
		</form>
	</div>
</div>

<?php 
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$current_image = $_POST['current_image'];
		$featured = $_POST['featured'];
		$action = $_POST['action'];

		if (isset($_FILES['image']['name'])) {
			$image_name = $_FILES['image']['name'];
			if ($image_name != "") {
				$ext = end(explode('.',$image_name));

					$image_name = "Movies_Category_".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/category/".$image_name;
					$upload = move_uploaded_file($source_path,$destination_path);
					if ($upload == False) {
						$_SESSION['upload'] = "<div class='error'>Failed To Upload Images.</div>";
						header('location:'.SITEURL.'admin/manage-category.php
							');
							die();
					}
					if ($current_image != "") {
						$remove_path = "../images/category/".$current_image;
							$remove = unlink($remove_path);
							if ($remove == False) {
								$_SESSION['failed-remove'] = "<div class='error'>Fail To Remove Current Image</div>";
								header('location:'.SITEURL.'admin/manage-category.php');
								die();

							}
					}


			}
			else{
				$image_name = $current_image;
			}
		}
		else{
			$image_name = $current_image;

		}


		$sql2 = "UPDATE tbl_category SET
			title = '$title',
			image_name = '$image_name',
			featured = '$featured',
			action = '$action'
			WHERE id = $id

		";
		$res2 = mysqli_query($conn,$sql2);
		if ($res2 == true) {
			$_SESSION['update'] = "<div class='success'>Category Update Successfully</div>";
			header('location:'.SITEURL.'admin/manage-category.php');

		}
		else{
			$_SESSION['update'] = "<div class='error'>Category Update Fail</div>";
			header('location:'.SITEURL.'admin/manage-category.php');

		}
	}


 ?>


<?php include('partials/footer.php'); ?>


