	</div>
	
	<footer></footer>

	<div id="modal-sm" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm cascading-modal" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>

	<div id="modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog cascading-modal" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>

	<div id="modal-lg" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg cascading-modal" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>

	<div id="waiting-div" style="display:none">
		<div class="text-center">
			<i class="fa fa-spinner fa-spin"></i> Chargement en cours ...
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/site.js"></script>
	
	<script type="text/javascript">
		var baseUrl = '<?php echo base_url(); ?>';
	</script>

	<?php foreach ($scripts as $script) { 
		echo '<script type="text/javascript" src="'.base_url().'assets/js/'.$script.'.js" /></script>';
	} ?>

	<?php if ($loadAdmin) { ?>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/home.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/static.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/types-categories.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/items.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/rooms.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/users.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/admin.js"></script>
	<?php } ?>
	</body>
</html>