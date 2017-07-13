<div class="row">
	<div class="md-form col-md-10">
		<!--Naked Form-->
		<div class="card-block">
			<div class="text-center">
				<?php
					if ($item->id == 0) $title = 'Création d\'une oeuvre';
					else $title = 'Modification d\'une oeuvre';
				?>
				<h3 class="blue-color"><i class="fa fa-pencil"></i> <?php echo $title; ?></h3>
				<hr class="mt-2 mb-2">
			</div>

			<div class="row">
				<div class="md-form col-md-4">
					<i class="fa fa-thermometer-quarter prefix"></i>
					<input type="text" id="item-title" class="form-control" />
					<label for="item-title">Titre</label>
				</div>

				<div class="md-form col-md-4">
					<i class="fa fa-user prefix"></i>
					<input type="text" id="item-author" class="form-control" />
					<label for="item-author">Auteur</label>
				</div>

				<div class="md-form col-md-4">
					<i class="fa fa-thermometer-quarter prefix"></i>
					<input type="date" id="item-publish-date" class="form-control" />
					<label for="item-publish-date" class="active">Date de sortie</label>
				</div>
			</div>

			<div class="row">
				<div class="md-form col-md-5">
					<select id="item-type" class="form-control bg-white-color" style="margin-left: 35px;">
						<option value="">Choisir un type ...</option>
						<?php foreach ($types as $type) { ?>
							<option value="t-<?php echo $type->id; ?>" <?php if ($type->id == $item->category->type->id) echo 'selected'; ?>><?php echo $type->name; ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-md-2"></div>

				<div class="md-form col-md-5">
					<select id="item-category" class="form-control bg-white-color" style="margin-left: 35px;">
						<option value="">Choisir une catégorie ...</option>
						<?php foreach ($categories as $category) { ?>
							<option value="<?php echo $category->id; ?>" data-chained="t-<?php echo $category->type->id; ?>" <?php if ($category->id == $item->category->id) echo 'selected'; ?>><?php echo $category->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="md-form col-md-12">
					<i class="fa fa-file-image-o prefix"></i>
					<input type="text" id="item-image" class="form-control" />
					<label for="item-image">Image</label>
				</div>
			</div>

			<div class="row">
				<div class="md-form col-md-12">
					<i class="fa fa-thermometer-three-quarters prefix"></i>
					<textarea type="text" id="item-description" class="md-textarea"></textarea>
					<label for="item-description">Description</label>
				</div>
			</div>

			<div class="text-center">
				<button class="btn bg-green-hover"><i class="fa fa-thermometer-full"></i>&nbsp;Enregistrer la page</button>
			</div>
		</div>
	</div>
</div>