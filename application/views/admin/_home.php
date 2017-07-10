<form method="post" action="admin/save_home">
	<div class="row">
		<div class="form-group col-md-5">
			<p>
				<label for="">Le concept</label>
				<textarea class="form-control" name="concept"><?php echo $concept; ?></textarea>
			</p>
		</div>

		<div class="form-group col-md-5">
			<p>
				<label for="">A la une</label>
				<input id="highlights" type="hidden" name="highlights" value="" />

				<input list="browsers" name="browser">
				<datalist id="browsers">
					<option value="Internet Explorer">
					<option value="Firefox">
					<option value="Chrome">
					<option value="Opera">
					<option value="Safari">
				</datalist>

				<select id="select-highlight">
					<option value="0">Sélectionner ...</option>
					<?php
						foreach ($items as $item) {
							echo '<option value="'.$item->id.'">'.$item->title.'</option>';
						}
					?>
				</select>

				<div class="highlight rounded" role="button">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
				</div>
				<div class="highlight rounded">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<span class="glyphicon glyphicon-minus slide-toggle-icon" aria-hidden="true"></span>
					<div class="highlight-item">
						<span id="item-id"></span>
					</div>
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