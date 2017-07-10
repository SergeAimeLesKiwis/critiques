	</div>
	
	<footer></footer>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/site.js"></script>

	<?php foreach ($scripts as $script) { 
		echo '<script type="text/javascript" src="'.base_url().'assets/js/'.$script.'.js" />';
	} ?>

	<div id="waiting-div" style="display:none">
		<div class="btn-lg text-center">
			<span class="glyphicon glyphicon-refresh animated bounce infinite"></span> Chargement en cours ...
		</div>
	</div>

	</body>
</html>