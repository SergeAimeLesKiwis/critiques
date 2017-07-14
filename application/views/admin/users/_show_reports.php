<hr />
<table class="table">
	<thead>
		<tr>
			<th class="text-center">Auteur du signalement</th>
			<th class="text-center">Raison</th>
			<th class="text-center">Date</th>
			<th class="text-center">Valeur</th>
		</tr>
	</thead>
	<tbody id="category-list">
		<?php foreach ($reports as $report) { ?>
			<tr id="report-<?php echo $report->id; ?>">
				<td scope="row"><?php echo $report->reported_by->getFullName(); ?></td>
				<td class="text-center"><?php echo $report->reason; ?></td>
				<td class="text-center"><?php echo $report->reported_at; ?></td>
				<td class="text-center"><?php echo $report->value; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>