<br />
<div class="row">
	<div class="col-md-12 text-center mb-2">Demandes</div>
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th class="text-center">Nom</th>
					<th class="text-center">Oeuvre</th>
					<th class="text-center">Type</th>
					<th class="text-center">Catégorie</th>
					<th class="text-center">Auteur</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="pending-list">
				<?php foreach ($pending as $room) { ?>
					<tr id="room-<?php echo $room->id; ?>">
						<?php $this->load->view('admin/rooms/_pending', array('room' => $room)); ?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<hr class="col-md-12 mt-2 mb-2" />
	<div class="col-md-12 text-center">Salons actifs</div>
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th class="text-center">Nom</th>
					<th class="text-center">Oeuvre</th>
					<th class="text-center">Type</th>
					<th class="text-center">Catégorie</th>
					<th class="text-center">Participants</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="active-list">
				<?php $this->load->view('admin/rooms/_active_list', array('actives' => $actives)); ?>
			</tbody>
		</table>
	</div>
</div>