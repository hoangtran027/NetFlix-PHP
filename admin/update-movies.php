<?php include('partials/menu.php'); ?>
<div class="content">
	<div class="wrapper">
		<h1>Update Category</h1>
		<br>

		<?php 
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$sql = "SELECT * FROM tbl_movies WHERE id='$id'";
				$res = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($res);
				if ($count == 1) {
					$row = mysqli_fetch_assoc($res);
					$title = $row['title'];
					$description = $row['description'];
					$current_image = $row['image_name'];
					$category = $row['category_id'];
					$featured =$row['featured'];
					$active = $row['action'];

				}
				else{
					$_SESSION['no-movies-found'] = "<div class='error'>Movies Not Found</div>";
					header('location:'.SITEURL.'admin/manage-movies.php');
				}
			}
			else{
				header('location:'.SITEURL.'admin/manage-movies.php');
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
					<td>Description :</td>
					<td>
						<textarea name="description" cols="30" rows="10" placeholder="Description of the movies">
							<?php echo $description; ?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td>Category :</td>
					<td>
						<select name="category">
						<?php 
							$sql = "SELECT * FROM tbl_category WHERE action ='Yes'";
							$res = mysqli_query($conn,$sql);
							$count = mysqli_num_rows($res);
							if ($count>0) {
								while($row = mysqli_fetch_assoc($res)){
									$category_title = $row['title'];
									$category_id = $row['id'];
									?>
									<option value="<?php echo $category_id ;?>"><?php echo $category_title; ?></option>
									<?php
								}
							}
							else{
								echo "<option value='0'>Category Not Availble</option>";
							}
						 ?>
						 </select>
					</td>
				</tr>
				<tr>
					<td>Current Images: </td>
					<td>
						<?php 
							if ($current_image != "") {
								?>
								<img src="<?php echo SITEURL ?>images/movies/<?php echo $current_image; ?>" style="width: 100px;">
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
		$description = $_POST['description'];
		$current_image = $_POST['image'];
		$category = $_POST['category'];
		$featured =$_POST['featured'];
		$active = $_POST['action'];


		if (isset($_FILES['image']['name'])) {
			$image_name = $_FILES['image']['name'];
			if ($image_name != "") {
				$ext = end(explode('.',$image_name));

					$image_name = "Movies_Name_".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/movies/".$image_name;
					$upload = move_uploaded_file($source_path,$destination_path);
					if ($upload == False) {
						$_SESSION['upload'] = "<div class='error'>Failed To Upload Images.</div>";
						header('location:'.SITEURL.'admin/manage-movies.php
							');
							die();
					}
					if ($current_image != "") {
						$remove_path = "../images/movies/".$current_image;
							$remove = unlink($remove_path);
							if ($remove == False) {
								$_SESSION['failed-remove'] = "<div class='error'>Fail To Remove Current Image</div>";
								header('location:'.SITEURL.'admin/manage-movies.php');
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


		$sql2 = "UPDATE tbl_movies SET
			title = '$title',
			description = '$description',
			image_name = '$image_name',
			category_id = '$category',
			featured = '$featured',
			action = '$action'
			WHERE id = $id

		";
		$res2 = mysqli_query($conn,$sql2);
		if ($res2 == true) {
			$_SESSION['update'] = "<div class='success'>Movies Update Successfully</div>";
			header('location:'.SITEURL.'admin/manage-movies.php');

		}
		else{
			$_SESSION['update'] = "<div class='error'>Movies Update Fail</div>";
			header('location:'.SITEURL.'admin/manage-movies.php');

		}
	}


 ?>


<?php include('partials/footer.php'); ?>


