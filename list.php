<?php include('partials-front/menu.php'); ?>

	<div class="container">
		<div class="content-container">
			<div class="movie-list-container">
				<h1 class="movie-list-title">
					List Movie
				</h1>
				<div class="movie-list-wrapper">
				<div class="movie-list">
					<?php 
						$sql = "SELECT * FROM tbl_mylist";
						$res = mysqli_query($conn,$sql);
						$count = mysqli_num_rows($res);
						if ($count >0) {
							while($row = mysqli_fetch_assoc($res)){
								$id = $row['id'];
								$title = $row['title'];
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
									<button class="movie-list-item-button">Watch</button>
									<a href="<?php echo SITEURL ?>list-remove.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="movie-list-item-input" style="text-decoration: none;">Remove</a>
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