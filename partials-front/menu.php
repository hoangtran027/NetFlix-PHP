<?php include ('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movie Design</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/movies.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
	<div class="navbar">
		<div class="navbar-container">
			<div class="logo-container">
				<h1 class="logo">NetFLix</h1>
			</div>
			<div class="menu-container">
				<ul class="menu-list">
					<li class="menu-list-item active">
						<a href="<?php echo SITEURL ;?>" class="menu-list-item-links">Home</a>
					</li>
					<li class="menu-list-item">
						<a href="<?php echo SITEURL ;?>tvshow.php" class="menu-list-item-links">TV Show</a>
					</li>
					<li class="menu-list-item">
						<a href="<?php echo SITEURL ;?>movies.php" class="menu-list-item-links">Movies</a>
					</li>
					<li class="menu-list-item">
						<a href="<?php echo SITEURL ;?>newpopular.php" class="menu-list-item-links">New & Popular</a>
					</li>
					<li class="menu-list-item">
						<a href="<?php echo SITEURL ;?>list.php" class="menu-list-item-links">MyList</a>
					</li>
				</ul>
			</div>
			<div class="profile-container">
				<img class="profile-picture" src="images/profile.jpg" >
				<?php 
					$sql = "SELECT * FROM tbl_admin";
					$res = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($res);
					if ($count==1) {
						while($row =mysqli_fetch_assoc($res)){
							$id = $row['id'];
							$username = $row['username'];
						}
					}
				 ?>
				<div class="profile-text-container">
					<span class="profile-text"><?php echo $username; ?></span>
					<i class="fas fa-caret-down"></i>
				</div>
				<div class="toggle">
					<i class="fas fa-moon toggle-icon"></i>
					<i class="fas fa-sun toggle-icon"></i>
					<div class="toggle-ball"></div>
				</div>
			</div>
		</div>
	</div>