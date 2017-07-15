<br />
<div class="row">
	<div class="col-md-10">
		<table class="table">
			<thead>
				<tr>
					<th class="text-center">Email</th>
					<th class="text-center">Prénom</th>
					<th class="text-center">Nom</th>
					<th class="text-center">Signalement</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="category-list">
				<?php foreach ($users as $user) { ?>
					<tr id="user-<?php echo $user->id; ?>">
						<td scope="row"><?php echo $user->email; ?></td>
						<td><?php echo $user->first_name; ?></td>
						<td><?php echo $user->last_name; ?></td>
						<td class="text-center">
							<?php
								$reports = 0;
								foreach ($user->reports as $report) { $reports += $report->value; }

								$span = '<span class="badge';
								if ($reports > 0) $span .= ' bg-green-hover show-report';
								else $span .= ' bg-green-color';
								$span .= '" data-key="'.$user->id.'"';
								if ($reports > 0) $span .= ' role="button"';
								$span .= '>'.$reports.'</span>';

								echo $span;
							?>
						</td>
						<td class="text-center">
							<?php echo $user->getAction(); ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div id="show-reports" class="col-md-10"></div>
</div>