<?php include('partials/menu.php'); ?>

	<div class="content">
		<div class="wrapper">
			<h1>Manage Movies</h1>
			<br>
			<?php 
			if (isset($_SESSION['add'])) {
			 	echo $_SESSION['add'];
			 	unset($_SESSION['add']);
			 }
			 if (isset($_SESSION['upload'])) {
			 	echo $_SESSION['upload'];
			 	unset($_SESSION['upload']);
			 }
			 if (isset($_SESSION['delete'])) {
			 	echo $_SESSION['delete'];
			 	unset($_SESSION['delete']);
			 }
			 if (isset($_SESSION['no-movies-found'])) {
			 	echo $_SESSION['no-movies-found'];
			 	unset($_SESSION['no-movies-found']);
			 }
			 if (isset($_SESSION['failed-remove'])) {
			 	echo $_SESSION['failed-remove'];
			 	unset($_SESSION['failed-remove']);
			 }
			 if (isset($_SESSION['update'])) {
			 	echo $_SESSION['update'];
			 	unset($_SESSION['update']);
			 }
			 ?>
			<br>
			<br>
			<br>
			<a href="<?php echo SITEURL; ?>admin/add-movies.php" class="btn-primary">Add Movies</a>
			<br>
			<br>
			<br>
			<table class="tbl-full">
				<tr>
					<td>STT</td>
					<td>Title</td>
					<td>Description</td>
					<td>Image</td>
					<td>Category</td>
					<td>Featured</td>
				</tr>
				<?php 
					$sql = "SELECT * FROM tbl_movies ";
					$res = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($res);
					$sn = 1;
					if ($count >0) {
						while($row = mysqli_fetch_assoc($res)){
							$id = $row['id'];
							$title = $row['title'];
							$description = $row['description'];
							$image_name = $row['image_name'];
							$category = $row['category_id'];
							$featured =$row['featured'];
							$active = $row['action'];
							?>
							<tr>
								<td><?php echo $sn++;?></td>
								<td><?php echo $title; ?></td>
								<td><?php echo $description;?></td>
								<td>
									<?php 
										if ($image_name=="") {
											echo "<div class='error'>Image Not Add.</div>";
										}
										else{
											?>
											<img src="<?php echo SITEURL; ?>images/movies/<?php echo $image_name; ?>" style="width: 100px;">
											<?php
										}
									 ?>
								</td>
								<td>
									<?php 
										if ($category == 10) {
											echo "<div>Action</div>";
										}
										if ($category == 11) {
											echo "<div>Anime</div>";
										}
										if ($category == 12) {
											echo "<div>Asian</div>";
										}
										if ($category == 13) {
											echo "<div>Award-Winning</div>";
										}
										if ($category == 14) {
											echo "<div>Children & Family</div>";
										}
										if ($category == 15) {
											echo "<div>Classics</div>";
										}
										if ($category == 16) {
											echo "<div>Comedies</div>";
										}
										if ($category == 17) {
											echo "<div>Crime</div>";
										}
										if ($category == 18) {
											echo "<div>Documentaries</div>";
										}
										if ($category == 18) {
											echo "<div>Documentaries</div>";
										}
										if ($category == 19) {
											echo "<div>Dramas</div>";
										}
										if ($category == 20) {
											echo "<div>Fantasy</div>";
										}
										if ($category == 21) {
											echo "<div>Halloween</div>";
										}
										if ($category == 22) {
											echo "<div>Hollywood</div>";
										}
										if ($category == 23) {
											echo "<div>Horror</div>";
										}
										if ($category == 24) {
											echo "<div>Independent</div>";
										}
										if ($category == 25) {
											echo "<div>Music & Musicals</div>";
										}
										if ($category == 26) {
											echo "<div>Romanse</div>";
										}
										if ($category == 27) {
											echo "<div>Sci-Fi</div>";
										}
										if ($category == 28) {
											echo "<div>Sports</div>";
										}
										if ($category == 29) {
											echo "<div>Stand-Up Comedy</div>";
										}
										if ($category == 30) {
											echo "<div>Thriller</div>";
										}
										if ($category == 31) {
											echo "<div>VietNamese Movies</div>";
										}
									 ?>
								</td>
								<td><?php echo $featured;?></td>

								<td>
									<a href="<?php echo SITEURL ?>admin/update-movies.php?id=<?php echo $id; ?>" class="btn-secondary">Update Movie</a>
									<a href="<?php echo SITEURL;?>admin/delete-movies.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Movie</a>
								</td>
							</tr>

							<?php 
						}
					}
					else{
						echo "<tr>
								<td colspan='7' class='error'>
									Food not add yet.
								</td>
							</tr>";
					}

				 ?>
			</table>
		</div>
	</div>


	
<?php include('partials/footer.php'); ?>