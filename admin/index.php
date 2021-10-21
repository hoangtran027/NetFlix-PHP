<?php include('partials/menu.php'); ?>
	
	<div class="content">
		<div class="wrapper">
			<h1>DASH BOARD</h1>

			<?php 
            if (isset($_SESSION['login'])) {
            	echo $_SESSION['login'];
            	unset($_SESSION['login']);
            }
             ?>

			<div class="col-4 text-center">
				<h1>5</h1>
				<br>
				Category
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br>
				Category
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br>
				Category
			</div>
			<div class="col-4 text-center">
				<h1>5</h1>
				<br>
				Category
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
<?php include('partials/footer.php'); ?>