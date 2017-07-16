<td scope="row"><?php echo $room->name; ?></td>

<td><?php echo $room->item->title; ?></td>

<td><?php echo $room->item->category->type->name; ?></td>

<td><?php echo $room->item->category->name; ?></td>

<td><?php echo $room->admin->getProfileTag(); ?></td>

<td>
	<button class="btn btn-sm room-activate room-action" data-action="activate_room" data-key="<?php echo $room->id; ?>">
		<i class="fa fa-trophy"></i>&nbsp;Activer
	</button>
	<button class="btn btn-sm room-delete room-action" data-action="delete_room" data-key="<?php echo $room->id; ?>">
		<i class="fa fa-trash"></i>&nbsp;Supprimer
	</button>
</td>