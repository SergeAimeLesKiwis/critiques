<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class User extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$this->load->view('');
		}

		public function subscribe($email) {
			$this->load->view('');
		}

		public function login() {
			$this->load->view('');
		}
	}
?>