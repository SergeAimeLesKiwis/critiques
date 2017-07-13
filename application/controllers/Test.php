<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Test extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$this->loadHeader('Test');

			// CONTENT
			$this->load->view('test/index');

			// FOOTER
			$this->loadFooter(array('scripts/test'));
		}

		public function receive() {
			// create physical image
			echo 'tchoin tchoin tchoin';
		}
	}
?>