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
			$this->load->view('banned/index');

			// FOOTER
			$this->loadFooter();
		}
	}
?>