<div class="container">
	<div class="section">
		<div class="row">
			<?php include ('loadData/loadData.php');?>
			<h2>Finished Processing</h2>
			<form id="LoadData" action="index.php" method="post">
				<input type="hidden" name="page" value="home">
				<button class="btn" type="submit" class="return">Return to the main page</button>
			</form>
		</div>
	</div>
</div>