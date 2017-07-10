	</div>
	
	<footer></footer>

	<div id="waiting-div" style="display:none">
		<div class="text-center">
			<i class="fa fa-spinner fa-spin"></i> Chargement en cours ...
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parallax.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/site.js"></script>
	
	<script type="text/javascript">
		var baseUrl = '<?php echo base_url(); ?>';
	</script>

	<?php foreach ($scripts as $script) { 
		echo '<script type="text/javascript" src="'.base_url().'assets/js/'.$script.'.js" /></script>';
	} ?>
	</body>
</html>