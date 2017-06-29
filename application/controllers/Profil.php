<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profil extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index()
		{
			$header['title'] = "Le Club des Critiques";
			$header['links'] = array();
			$this->load->view('structure/header', $header);
			$this->load->view('profile');
			$this->load->view('structure/footer');
		}
	}
?>