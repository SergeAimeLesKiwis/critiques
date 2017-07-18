<br />
<div class="row">
	<div class="md-form col-md-10">
		<div class="card-block">
			<div class="text-center">
				<h3 class="blue-color"><i class="fa fa-pencil"></i> <?php echo $title; ?></h3>
			</div>

			<?php if (!empty($pages)) { ?>
				<div class="row">
					<div class="md-form col-md-9">
						<input type="text" id="datalist-pages" list="pages" class="input-select form-control bg-white-color" placeholder="Choisir une page" />
						<datalist id="pages">
							<?php foreach ($pages as $page) { ?>
								<option value="<?php echo $page->label; ?>" data-key="<?php echo $page->id; ?>"><?php echo $page->name; ?></option>
							<?php } ?>
						</datalist>
					</div>
					<div id="icons-loader" class="md-form col-md-1 text-center">
						<i class="fa fa-times red-color invisible animated"></i>
						<i class="fa fa-check green-color invisible animated"></i>
					</div>
					<div class="md-form col-md-2">
						<button id="datalist-loader" class="btn btn-sm bg-darkgrey-color form-control"><i class="fa fa-eercast"></i>&nbsp;Charger</button>
					</div>
				</div>
			<?php } ?>

			<hr class="mb-2" />

			<div id="form-content">
				<?php
					if (empty($pages)) {
						$form['page'] = new Page_VM();
						$form['url'] = $url;
						$this->load->view('admin/pages/_form', $form);
					}
				?>
			</div>
		</div>
	</div>
</div>