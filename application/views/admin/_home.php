<form method="post" action="admin/save_home">
	<div class="row">
		<div class="form-group col-md-5">
			<p>
				<label for="">Le concept</label>
				<textarea class="form-control" name="concept"></textarea>
			</p>
		</div>

		<div class="form-group col-md-5">
			<p>
				<label for="">A la une</label>
				<input type="hidden" name="highlights" value="" />

				<select>
					<option>Sélectionner ...</option>
					<?php
						foreach ($items as $item) {
							echo '<option value="'.$item->id.'">'.$item->title.'</option>';
						}
					?>
				</select>

				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" role="button" aria-hidden="true"></span>
				</div>
			</p>
		</div>

		<div class="form-group col-md-5">
			<p>
				<input type="submit" value="Enregistrer" />
			</p>
		</div>
	</div>
</form>