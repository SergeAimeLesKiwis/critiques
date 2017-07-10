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

				<input id="select-highlight" list="contents" name="contents">
				<datalist id="contents">
					<?php
						foreach ($items as $item) {
							echo '<option value="'.$item->title.'">'.$item->id.'</option>';
						}
					?>
				</datalist>

				<div class="highlight rounded" role="button">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					<i class="fa fa-plus"></i>
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