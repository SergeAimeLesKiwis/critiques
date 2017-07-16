	</div>
	
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
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/common.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/home.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/pages.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/types-categories.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/items.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/rooms.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/users.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts/admin/admin.js"></script>
	<?php } ?>

		<footer class="page-footer bg-darkgrey-color center-on-small-only no-margin">
		<!-- 
		    <div class="container-fluid">
		        <div class="row">

		            <div class="col-md-6">
		                <h5 class="title"> À propos du Club des Critiques </h5>
		                <p>Entreprise à petite échelle, nous faisons partager à nos utilisateurs notre passion pour les oeuvres !</p>
		            </div>

		            <div class="col-md-6">
		                <h5 class="title">Mentions</h5>
		                <ul>
		                    <li><a href="#!">Mentions Légales</a></li>
		                    <li><a href="#!">À propos du Club des Critiques</a></li>
		                </ul>
		            </div>
		        </div>
		    </div> -->

		    <div class="footer-copyright">
		        <div class="container-fluid">
		            <a href="<?php echo base_url(); ?>">Tous droits réservés - Le Club des Critiques&nbsp;<i class="fa fa-copyright"></i> - 2017</a>
				</div>
		    </div>
		</footer>
	</body>
</html>