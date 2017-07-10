<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Room extends Base {

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

			$this->load->view('room/index', $content);

			// FOOTER
			$footer['scripts'] = array();
			$this->load->view('shared/footer', $footer);
		}
	}
?>