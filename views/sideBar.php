<ul id="sideBar">
	<li>
		<p>Use the buttons below to drill through the data</p>
	</li>
	<li>
		<h5>Time</h5>
		<ul>
			<li>
				<form id="timeYear" action="index.php" method="post">
					<input type="hidden" name="page" value="home">
					<input type="hidden" name="datedrill" value="year">
					<input type="hidden" name="itemdrill" value="<?php echo $itemdrill?>">
					<button class="btn" type="submit" width="100%">Year</button>
				</form>
			</li>
			<li>
				<form id="timeMonth" action="index.php" method="post">
					<input type="hidden" name="page" value="home">
					<input type="hidden" name="datedrill" value="month">
					<input type="hidden" name="itemdrill" value="<?php echo $itemdrill?>">
					<button class="btn" type="submit" width="100%">Month</button>
				</form>
			</li>
			<li>
				<form id="timeDay" action="index.php" method="post">
					<input type="hidden" name="page" value="home">
					<input type="hidden" name="datedrill" value="day">
					<input type="hidden" name="itemdrill" value="<?php echo $itemdrill?>">
					<button class="btn" type="submit" width="100%">Day</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		<h5>Items</h5>
		<ul>
			<li>
				<form id="itemCategory" action="index.php" method="post">
					<input type="hidden" name="page" value="home">
					<input type="hidden" name="datedrill" value="<?php echo $datedrill?>">
					<input type="hidden" name="itemdrill" value="category">
					<button class="btn" type="submit" class="drillButton">Category</button>
				</form>
			</li>
			<li>
				<form id="itemCategory" action="index.php" method="post">
					<input type="hidden" name="page" value="home">
					<input type="hidden" name="datedrill" value="<?php echo $datedrill?>">
					<input type="hidden" name="itemdrill" value="item">
					<button class="btn" type="submit" class="drillButton">Item</button>
				</form>
			</li>
		</ul>
	</li>
	<li>
		Use this button to load in the data.  WARNING:  This process can take over 30 minutes to finish.
		<form id="LoadData" action="index.php" method="post">
			<input type="hidden" name="page" value="load">
			<button class="btn" type="submit" class="loadButton">Load Data</button>
		</form>
	</li>
</ul>