<div class="row">
	<div class="col-md-4">
		<h3>
			<span>Types</span>
			<button id="create-type" class="btn btn-sm btn-primary" data-action="type" data-id="0"><i class="fa fa-plus"></i></button>
		</h3>
		<table class="table table-sm">
			<tbody id="type-list">
				<?php $this->load->view('admin/types_categories/_type_list', array('types' => $types)); ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<h3>
			<span>Catégories</span>
			<button id="create-category" class="btn btn-sm btn-primary" data-action="category" data-id="0"><i class="fa fa-plus"></i></button>
		</h3>
		<table class="table table-sm">
			<tbody id="category-list">
				<?php $this->load->view('admin/types_categories/_category_list', array('categories' => $categories)); ?>
			</tbody>
		</table>
	</div>
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm cascading-modal" role="document">
		<div class="modal-content">
		</div>
	</div>
</div>