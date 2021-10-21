<?php include('partials/menu.php'); ?>

	<div class="content">
		<div class="wrapper">
			<h1>Manage Category</h1>
			<?php 
			if (isset($_SESSION['add'])) {
			 	echo $_SESSION['add'];
			 	unset($_SESSION['add']);
			 }
			 if (isset($_SESSION['delete'])) {
			 	echo $_SESSION['delete'];
			 	unset($_SESSION['delete']);
			 }
			 if (isset($_SESSION['remove'])) {
			 	echo $_SESSION['remove'];
			 	unset($_SESSION['remove']);
			 }
			 if (isset($_SESSION['no-category-found'])) {
			 	echo $_SESSION['no-category-found'];
			 	unset($_SESSION['no-category-found']);
			 }
			 if (isset($_SESSION['update'])) {
			 	echo $_SESSION['update'];
			 	unset($_SESSION['update']);
			 }
			 if (isset($_SESSION['upload'])) {
			 	echo $_SESSION['upload'];
			 	unset($_SESSION['upload']);
			 }
			 if (isset($_SESSION['failed-remove'])) {
			 	echo $_SESSION['failed-remove'];
			 	unset($_SESSION['failed-remove']);
			 }

			 ?>
			 <br>
			 <br>
			<br>
			<a href="<?php echo SITEURL?>admin/add-category.php" class="btn-primary">Add Category</a>
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<td>STT</td>
					<td>Title</td>
					<td>Image</td>
					<td>Featured</td>
					<td>Action</td>
				</tr>
				<?php 
					$sql = "SELECT * FROM tbl_category";
					$res = mysqli_query($conn,$sql);
					if ($res == True) {
						$count = mysqli_num_rows($res);
						$sn = 1;
						if ($count >0) {
							while ($rows = mysqli_fetch_assoc($res)) {
								$id = $rows['id'];
								$title = $rows['title'];
								$image_name = $rows['image_name'];
								$action = $rows['action'];
								$featured = $rows['featured'];

								?>
								<tr>
									<td><?php echo $sn++; ?></td>
									<td><?php echo $title; ?></td>
									<td>
										<?php 
											if ($image_name != "") {
												?>
												<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" style="width: 100px;">
												<?php
											}
											else{
												echo "<div class='error'>Image Not Add</div>";
											}
										 ?>
									</td>
									<td><?php echo $action; ?></td>
									<td><?php echo $featured; ?></td>

									<td>
										<a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>
										<a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete admin</a>
									</td>
								</tr>
								<?php
								}
							}
						else{
							?>
							<tr>
								<td colspan="6">
									<div class="error">
										No Category Added.
									</div>
								</td>
							</tr>
							<?php
						}
					}

				 ?>
			</table>
		</div>
	</div>


	
<?php include('partials/footer.php'); ?>