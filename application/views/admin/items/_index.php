<br />
<div class="row">
	<div class="md-form col-md-10">
		<div class="card-block">
			<div class="text-center">
				<h3 class="blue-color"><i class="fa fa-pencil"></i> <?php echo $title; ?></h3>
			</div>

			<?php if (!empty($all_items)) { ?>
				<div class="row">
					<div class="md-form col-md-9">
						<?php
							$list['items'] = $all_items;
							$list['placeholder'] = 'Choisir une oeuvre';
							$this->load->view('shared/_datalist_items', $list);
						?>
					</div>

					<?php $this->load->view('shared/_datalist_loader') ?>
				</div>
			<?php } ?>

			<hr class="mb-2" />

			<div id="form-content">
				<?php
					if (empty($all_items)) {
						$form['item'] = new Item_VM();
						$form['types'] = $types;
						$form['categories'] = $categories;
						$form['url'] = $url;
						$this->load->view('admin/items/_form', $form);
					}
				?>
			</div>
		</div>
	</div>
</div>