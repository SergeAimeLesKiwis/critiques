<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Banned extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$this->loadHeader('Banni !');

			// CONTENT
			$this->load->view('banned/index');

			// FOOTER
			$this->loadFooter();
		}
	}
?>