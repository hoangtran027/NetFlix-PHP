<?php include('partials-front/menu.php'); ?>

	<div class="container">
		<div class="content-container">
			<div class="dropdown">
				<nav>
					<ul>
						<li>
							<h2 class="dropdown-title" style="font-size: 45px;">Movies</h2>
						</li>
						<li>
							<a href="#">Genres
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
					Comedies Moives
				</h1>
				<div class="movie-list-wrapper">
				<div class="movie-list">
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
									<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
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
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Anime Moives
				</h1>
				<div class="movie-list-wrapper">
					<div class="movie-list">
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
										<span class="movie-list-item-title"><?php echo $title; ?></span>
										<p class="movie-list-item-desc"><?php echo $description; ?></p>
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
						
					</div>
					<i class="fas fa-chevron-right arrow"></i>
				</div>				
			</div>
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Comedies Moives
				</h1>
				<div class="movie-list-wrapper">
					<div class="movie-list">
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
										<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
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
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					Action Moives
				</h1>
				<div class="movie-list-wrapper">
					<div class="movie-list">
						<?php 
							$sql = "SELECT * FROM tbl_movies WHERE action='Yes' AND featured = 'Yes' AND category_id = '10'";
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
										<a href="<?php echo SITEURL ?>list-movies.php?id=<?php echo $id; ?>" class="movie-list-item-input" style="text-decoration: none;">Add List</a>
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