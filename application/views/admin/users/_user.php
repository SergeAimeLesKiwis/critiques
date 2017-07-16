<td scope="row">
	<a class="brown-hover" href="<?php echo base_url().'user/profile/'.$user->id; ?>"><?php echo $user->getFullName(); ?></a>
</td>

<td><?php echo $user->username; ?></td>

<td><?php echo $user->email; ?></td>

<td class="text-center">
	<?php if ($user->reports != null) { ?>
		<span class="badge bg-green-hover show-reports bg-green-color" data-key="<?php echo $user->id; ?>" role="button">
			<?php echo $user->reports; ?>
		</span>
	<?php } else { ?>
		<em>Aucun signalement</em>
	<?php } ?>
</td>

<td class="text-center">
	<?php echo $user->getAction(); ?>
</td>