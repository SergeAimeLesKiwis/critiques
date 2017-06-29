<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Room extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index()
		{
			// HEADER
			$header['title'] = "Contenus";
			$header['links'] = array();
			$this->load->view('shared/header', $header);

			// CONTENT
			$content = array();
			$this->load->view('room/index', $content);

			// FOOTER
			$this->load->view('shared/footer');
		}
	}
?>