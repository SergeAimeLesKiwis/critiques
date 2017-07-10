<form method="post" action="admin/save_home">
	<div class="row">
		<div class="md-form col-md-10">
			<textarea type="text" id="concept" name="concept" class="md-textarea"><?php echo $concept; ?></textarea>
			<label for="concept">Le concept</label>
		</div>
		<hr />
		<div class="md-form col-md-10">
			<?php

				$value = '';
				foreach ($highlights as $item) {
					if ($item != null) $value .= $item->id . '|';
					else $value .= '0|';
				}
				$value = substr($value, 0, -1);

				$first = $highlights[0];
				$second = $highlights[1];
				$third = $highlights[2];
				$fourth = $highlights[3];
				$fifth = $highlights[4];
				$sixth = $highlights[5];
			?>

			<h3 data-test="<?php echo $value; ?>">A la une</h3>
			<input id="highlights" type="hidden" name="highlights" value="<?php echo $value; ?>" />

			<input id="select-highlight" list="items" name="items">
			<datalist id="items">
				<?php
					foreach ($items as $item) {
						echo '<option value="'.$item->title.'" data-item="'.$item->id.'"></option>';
					}
				?>
			</datalist>
			<br />

			<div class="row">
				<div class="card col-md-4 highlight" id="first">
					<?php $this->load->view('admin/_highlight_container', array('item' => $first, 'position' => 'first')); ?>
				</div>
				<div class="card col-md-4 highlight" id="second">
					<?php $this->load->view('admin/_highlight_container', array('item' => $second, 'position' => 'second')); ?>
				</div>
				<div class="card col-md-4 highlight" id="third">
					<?php $this->load->view('admin/_highlight_container', array('item' => $third, 'position' => 'third')); ?>
				</div>
				<div class="card col-md-4 highlight" id="fourth">
					<?php $this->load->view('admin/_highlight_container', array('item' => $fourth, 'position' => 'fourth')); ?>
				</div>
				<div class="card col-md-4 highlight" id="fifth">
					<?php $this->load->view('admin/_highlight_container', array('item' => $fifth, 'position' => 'fifth')); ?>
				</div>
				<div class="card col-md-4 highlight" id="sixth">
					<?php $this->load->view('admin/_highlight_container', array('item' => $sixth, 'position' => 'sixth')); ?>
				</div>
			</div>
		</div>

		<div class="md-form col-md-10">
			<input class="pull-right btn btn-primary" type="submit" value="Enregistrer les modifications" />
		</div>
	</div>
</form>