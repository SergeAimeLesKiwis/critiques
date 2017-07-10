<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Item extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = "Contenus";
			$header['styles'] = array();
			$this->load->view('shared/header', $header);

			// CONTENT
			$content = array();

			$this->load->view('item/index', $content);

			// FOOTER
			$footer['scripts'] = array();
			$this->load->view('shared/footer', $footer);
		}
	}
?>