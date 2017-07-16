<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Room extends Base {

		public function __construct() {
			parent::__construct();

			$this->page = 'Salons';
		}

		public function index() {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$data = array();

			$this->load->view('room/index', $data);

			// FOOTER
			$this->loadFooter();
		}
	}
?>