<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s2">
				<?php include("views/sidebar.php")?>
			</div>
			<div class="col s10">
				<table>
					<tr>
						<?php foreach ($tableHead as $head): ?>
							<th><?php echo $head; ?></th>
							
						
						<?php endforeach ?>
					</tr>
					<?php foreach ($results as $row):?>
						<tr>
							<?php foreach ($tableHead as $head): ?>
								<td><?php echo $row[$head]?></td>
							<?php endforeach ?>
						</tr>
					<?php endforeach?>
				</table>
			</div>
		</div>
	</div>
</div>