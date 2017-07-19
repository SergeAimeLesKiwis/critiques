<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Banned extends Base {

		public function __construct() {
			parent::__construct();

			$this->page = 'Banni !';
		}

		public function index() {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$data['message'] = 'Ooops, il semblerait que vous n\'ayez pas les droits nécéssaires pour accéder à cette page.';
			$this->load->view('errors/index', $data);

			// FOOTER
			$this->loadFooter();
		}
	}
?>