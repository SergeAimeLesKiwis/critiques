<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Room extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$this->loadHeader('Salons');

			// CONTENT
			$content = array();

			$this->load->view('room/index', $content);

			// FOOTER
			$this->loadFooter();
		}
	}
?>