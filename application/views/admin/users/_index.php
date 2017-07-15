<br />
<div class="row">
	<div class="col-md-10">
		<table class="table">
			<thead>
				<tr>
					<th class="text-center">Utilisateur</th>
					<th class="text-center">Pseudo</th>
					<th class="text-center">Email</th>
					<th class="text-center">Signalement</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody id="user-list">
				<?php foreach ($users as $user) { ?>
					<tr id="user-<?php echo $user->id; ?>">
						<?php $this->load->view('admin/users/_user', array('user' => $user)); ?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<div id="reports" class="col-md-10"></div>
</div>