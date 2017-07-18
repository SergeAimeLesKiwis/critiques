<br />
<div class="row">
	<div class="md-form col-md-10">
		<?php
			$editable['id'] = 'concept';
			$editable['content'] = $concept;
			$editable['is_active'] = $concept != '';
			$editable['label'] = 'Le concept';
			$this->load->view('shared/_editable', $editable);
		?>
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

		<h3 class="blue-color"><b> À la une </b></h3>
		<input id="highlights" type="hidden" name="highlights" value="<?php echo $value; ?>" />

		<div class="md-form">
			<?php
				$list['items'] = $all_items;
				$list['placeholder'] = 'Choisir une oeuvre';
				$this->load->view('shared/_datalist_items', $list);
			?>
		</div>

		<div id="highlights-container" class="row">
			<div class="card col-md-3 highlight spacer" id="first">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $first, 'position' => '#first')); ?>
			</div>
			<div class="card col-md-3 highlight spacer" id="second">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $second, 'position' => '#second')); ?>
			</div>
			<div class="card col-md-3 highlight spacer" id="third">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $third, 'position' => '#third')); ?>
			</div>
			<div class="card col-md-3 highlight spacer" id="fourth">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $fourth, 'position' => '#fourth')); ?>
			</div>
			<div class="card col-md-3 highlight spacer" id="fifth">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $fifth, 'position' => '#fifth')); ?>
			</div>
			<div class="card col-md-3 highlight spacer" id="sixth">
				<?php $this->load->view('admin/home/_highlight_container', array('item' => $sixth, 'position' => '#sixth')); ?>
			</div>
		</div>
	</div>

	<div class="md-form col-md-3">
		<button class="pull-left btn bg-green-hover" id="save-home">Enregistrer les modifications</button>
	</div>
</div>