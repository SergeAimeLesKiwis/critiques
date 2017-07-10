<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profil extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = "Le Club des Critiques";
			$header['styles'] = array();
			$this->load->view('shared/header', $header);

			// CONTENT
			$content = array();

			$this->load->view('profil/index', $content);

			// FOOTER
			$footer['scripts'] = array();
			$this->load->view('shared/footer', $footer);
		}
	}
?>