<td scope="row">
	<a class="brown-hover" href="<?php echo base_url().'user/profile/'.$user->id; ?>"><?php echo $user->getFullName(); ?></a>
</td>

<td><?php echo $user->username; ?></td>

<td><?php echo $user->email; ?></td>

<td class="text-center">
	<?php
		$reports = 0;
		foreach ($user->reports as $report) { $reports += $report->value; }

		$span = '<span class="badge';
		if ($reports > 0) $span .= ' bg-green-hover show-reports';
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