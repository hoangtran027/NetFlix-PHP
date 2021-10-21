<?php include('partials-front/menu.php'); ?>


	<div class="container">
		<div class="content-container">
			<div class="dropdown">

		<?php 
        	if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tbl_category WHERE id = $category_id";
            $res = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];

        }
        else{
            header('location:'.SITEURL);
        }
        ?>
				<nav>
					<ul>
						<li>
							<h2 class="dropdown-title">Movies</h2>
						</li>
						<li>
							<a href="#">
								<?php echo $category_title; ?>
								<i class="fas fa-sort-down"></i>
							</a>
							<ul>
								<?php 
									$sql = "SELECT * FROM tbl_category LIMIT 7";
									$res = mysqli_query($conn,$sql);
									$count = mysqli_num_rows($res);
									if ($count >0) {
										while($row = mysqli_fetch_assoc($res)){
											$id = $row['id'];
											$title = $row['title'];
											?>
											<li>
												<a href="<?php echo SITEURL;?>movie-category.php?category_id=<?php echo $id; ?>"><?php echo $title; ?></a>
											</li>
											<?php
										}
									}
									else{
										echo "<div class='error'>Category not found.</div>";
									}
								 ?>	
							</ul>
		
						</li>
					</ul>
				</nav>
			</div>
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					<?php echo $category_title; ?> Movies
				</h1>
				<div class="movie-list-wrapper">
				<div class="movie-list">
					<?php 
							$sql = "SELECT * FROM tbl_movies WHERE action='Yes' AND featured = 'Yes' AND category_id = $category_id";
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
										<span class="movie-list-item-title"><?php echo $title; ?></span>
										<p class="movie-list-item-desc"><?php echo $description; ?></p>
										<button class="movie-list-item-button">Watch</button>
									</div>
									<?php

								}
							}
							else{
								echo "<div class='error'>Movie Not Availble.</div>";
							}
						 ?>
											
				</div>
				<i class="fas fa-chevron-right arrow"></i>
				</div>
			</div>
		</div>
	</div>


<?php include('partials-front/footer.php'); ?>
