<form method="post" action="admin/save_home">
	<div class="row">
		<div class="md-form col-md-10">
			<textarea type="text" id="concept" name="concept" class="md-textarea"><?php echo $concept; ?></textarea>
			<label for="concept">Le concept</label>
		</div>
		<hr />
		<div class="md-form col-md-10">
			<?php
				// foreach ($highlights as $item) {
				// 	$this->load->view('shared/_item_container', array('item' => $item)); 
				// }

				$first = $highlights[0];
				$second = $highlights[1];
				$third = $highlights[2];
				$fourth = $highlights[3];
				$fifth = $highlights[4];
				$sixth = $highlights[5];
			?>

			<h3>A la une</h3>
			<input id="highlights" type="hidden" name="highlights" value="" />

			<input id="select-highlight" list="contents" name="contents">
			<datalist id="contents">
				<?php
					foreach ($items as $item) {
						echo '<option value="'.$item->title.'">'.$item->id.'</option>';
					}
				?>
			</datalist>

			<div class="row">
				<?php
					$this->load->view('admin/_highlight_container', array('item' => $first, 'position', 0));
					$this->load->view('admin/_highlight_container', array('item' => $second, 'position', 1));
					$this->load->view('admin/_highlight_container', array('item' => $third, 'position', 2));
					$this->load->view('admin/_highlight_container', array('item' => $fourth, 'position', 3));
					$this->load->view('admin/_highlight_container', array('item' => $fifth, 'position', 4));
					$this->load->view('admin/_highlight_container', array('item' => $sixth, 'position', 5));
				?>
			</div>
		</div>

		<div class="md-form col-md-10">
			<input class="pull-right" type="submit" value="Enregistrer les modifications" />
		</div>
	</div>
</form>