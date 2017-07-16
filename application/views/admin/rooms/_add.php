<br />
<div class="row">
	<div class="md-form col-md-10">
		<div class="card-block">
			<div class="text-center">
				<h3 class="blue-color"><i class="fa fa-pencil"></i> Création d'un salon</h3>
			</div>

			<div class="row">
				<div class="md-form col-md-9">
					<?php
						$datalist_items['items'] = $datalistItems;
						$datalist_items['placeholder'] = 'Choisir une oeuvre';
						$this->load->view('shared/_datalist_items', $datalist_items);
					?>
				</div>

				<?php $this->load->view('shared/_datalist_loader') ?>
			</div>

			<hr class="mt-2 mb-2">

			<div id="form-content">
				<input type="hidden" id="room-item" value="" />

				<div class="row">
					<div class="md-form col-md-4">
						<i class="fa fa-thermometer-quarter prefix"></i>
						<input type="text" id="room-name" class="form-control" value="" />
						<label for="room-name">Nom</label>
					</div>

					<div class="md-form col-md-4">
						<i class="fa fa-user prefix"></i>
						<input type="date" id="room-start-date" class="form-control" value="" />
						<label for="room-start-date" class="active">Début</label>
					</div>

					<div class="md-form col-md-4">
						<i class="fa fa-thermometer-quarter prefix"></i>
						<input type="date" id="room-end-date" class="form-control" value="" />
						<label for="room-end-date" class="active">Date de Fin</label>
					</div>
				</div>

				<div class="text-center">
					<button id="send-infos" class="btn bg-green-hover" data-action="add_room"><i class="fa fa-thermometer-full"></i>&nbsp;Valider</button>
				</div>
			</div>
		</div>
	</div>
</div>