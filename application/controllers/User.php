<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller {

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