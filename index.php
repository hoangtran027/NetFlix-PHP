<?php include('partials-front/menu.php'); ?>
<!-- 
	<div class="sidebar">
		<i class="left-menu-icon fas fa-search"></i>
		<i class="left-menu-icon fas fa-home"></i>
		<i class="left-menu-icon fas fa-users"></i>
		<i class="left-menu-icon fas fa-bookmark"></i>
		<i class="left-menu-icon fas fa-tv"></i>
		<i class="left-menu-icon fas fa-hourglass-start"></i>
		<i class="left-menu-icon fas fa-shopping-cart"></i>

	</div> -->

	<div class="container">
		<div class="content-container">
			<div class="featured-content" style="background: linear-gradient(to bottom , rgba(0,0,0,0),#151515),url(images/f-1.jpg);">
				<img src="images/f-t-1.png" class="featured-title">
				<p class="featured-desc">Phim moi</p>
				<button class="featured-button">WATCH</button>
			</div>
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Action Movies
				</h1>
				<div class="movie-list-wrapper">
					<form action="" class="movie-list" method="POST" enctype="multipart/form-data">
						<?php 
							$sql = "SELECT * FROM tbl_movies WHERE featured = 'Yes' AND category_id = '10'";
							$res = mysqli_query($conn,$sql);
							$count = mysqli_num_rows($res);
							if ($count >0) {
								while($row = mysqli_fetch_assoc($res)){
									$id = $row['id'];
									$title = $row['title'];
									$description = $row['description'];
									$image_name = $row['image_name'];
									?>
									<div class="movie-list-item">
										<?php
											if ($image_name =="") {
												echo "<div class='error'>Image Not Available</div>";
											}
											else{
												?>
												<img  class="movie-list-item-img" src="<?php echo SITEURL; ?>images/movies/<?php echo $image_name; ?>">
												<?php
											}
										?>
										<span class="movie-list-item-title" name='title'><?php echo $title; ?></span>
										<button class="movie-list-item-button">Watch</button>
										<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
									</div>
									<?php

								}
							}
							else{
								echo "<div class='error'>Movie Not Availble.</div>";
							}
						 ?>
					</form>
					<i class="fas fa-chevron-right arrow"></i>
				</div>
			</div>
			<div class="featured-content" style="background: linear-gradient(to bottom , rgba(0,0,0,0),#151515),url(images/f-2.jpg);">
				<img src="images/f-t-2.png" class="featured-title">
				<p class="featured-desc">Phim moi</p>
				<button class="featured-button">WATCH</button>
			</div>
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Anime Movies
				</h1>
				<div class="movie-list-wrapper">
					<form action="" method="POST" enctype="multipart/form-data"  class="movie-list">
						<?php 
							$sql = "SELECT * FROM tbl_movies WHERE action='Yes' AND featured = 'Yes' AND category_id = '11'";
							$res = mysqli_query($conn,$sql);
							$count = mysqli_num_rows($res);
							if ($count >0) {
								while($row = mysqli_fetch_assoc($res)){
									$id = $row['id'];
									$title = $row['title'];
									$description = $row['description'];
									$image_name = $row['image_name'];
									?>
									<div class="movie-list-item">
										<?php
											if ($image_name =="") {
												echo "<div class='error'>Image Not Available</div>";
											}
											else{
												?>
												<img class="movie-list-item-img" src="<?php echo SITEURL; ?>images/movies/<?php echo $image_name; ?>">
												<?php
											}
										?>
										<span class="movie-list-item-title" name='title'><?php echo $title; ?></span>
										<button class="movie-list-item-button">Watch</button>
										<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
									</div>
									<?php

								}
							}
							else{
								echo "<div class='error'>Movie Not Availble.</div>";
							}
						 ?>
					</form>
					<i class="fas fa-chevron-right arrow"></i>
				</div>
			</div>
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Comedies Moives
				</h1>
				<div class="movie-list-wrapper">
					<form action="" class="movie-list" method="POST" enctype="multipart/form-data">
						<?php 
							$sql = "SELECT * FROM tbl_movies WHERE action='Yes' AND featured = 'Yes' AND category_id = '16'";
							$res = mysqli_query($conn,$sql);
							$count = mysqli_num_rows($res);
							if ($count >0) {
								while($row = mysqli_fetch_assoc($res)){
									$id = $row['id'];
									$title = $row['title'];
									$description = $row['description'];
									$image_name = $row['image_name'];
									?>
									<div class="movie-list-item" name='image'>
										<?php
											if ($image_name =="") {
												echo "<div class='error'>Image Not Available</div>";
											}
											else{
												?>
												<img class="movie-list-item-img" src="<?php echo SITEURL; ?>images/movies/<?php echo $image_name; ?>">
												<?php
											}
										?>
										<span class="movie-list-item-title" name='title'><?php echo $title; ?></span>
										<button class="movie-list-item-button">Watch</button>
										<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
									</div>
									<?php

								}
							}
							else{
								echo "<div class='error'>Movie Not Availble.</div>";
							}
						 ?>
					</form>
					<i class="fas fa-chevron-right arrow"></i>
				</div>				
			</div>

		</div>
	</div>


<?php include('partials-front/footer.php'); ?>

<?php 
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$image = $_POST['image'];


		$sql2 = "INSERT tbl_mylist SET
			title = '$title',
			image_name = '$image'
			WHERE id = $id
		";
		$res2 = mysqli_query($conn,$sql2);
	}


 ?>
