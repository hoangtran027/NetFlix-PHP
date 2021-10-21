<?php include('partials/menu.php'); ?>

<div class="content">
	<div class="wrapper">
		<h2>Add Category</h2>
		<div class="margin-40"></div>
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
						Description:
					</td>
					<td>
						<textarea name="description" cols="30" rows="10" placeholder="Description of the movies"></textarea>
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
						Category :
					</td>
					<td>
						<select name="category">
							<?php 
								$sql = "SELECT * FROM tbl_category WHERE action = 'Yes'";
								$res = mysqli_query($conn,$sql);
								$count = mysqli_num_rows($res);
								if ($count >0) {
									while ($row = mysqli_fetch_assoc($res)) {
										$id = $row['id'];
										$title = $row['title'];
										?>
										<option value="<?php echo $id ?>"><?php echo $title; ?></option>
										<?php
									}
								}
								else{
									?>
									<option value="1">No Category Found</option>
									<?php
								}
							 ?>

						</select>
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
		$description = $_POST['description'];
		$category = $_POST['category'];

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

					$image_name = "Movies_Name_".rand(000,999).'.'.$ext;

					$source_path = $_FILES['image']['tmp_name'];
					$destination_path = "../images/movies/".$image_name;
					$upload = move_uploaded_file($source_path,$destination_path);
					if ($upload == False) {
						$_SESSION['upload'] = "<div class='error'>Failed To Upload Images.</div>";
						header('location:'.SITEURL.'admin/add-moives.php
							');
							die();
					}
				}
		}
		else{
			$image_name = "";
		}

		$sql2 = "INSERT INTO tbl_movies SET 
			title = '$title',
			description = '$description',
			image_name = '$image_name',
			category_id = '$category',
			featured = '$featured',
			action = '$action'
		";

		$res2 = mysqli_query($conn,$sql2);
		if ($res2 ==True ) {
			$_SESSION['add'] = "Category Added Successfully";
			header("location:".SITEURL.'admin/manage-movies.php');
		}
		else{
			$_SESSION['add'] = "Failed Added Category Successfully";
			header("location:".SITEURL.'admin/manage-movies.php');
		}

	}
?>