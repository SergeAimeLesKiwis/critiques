<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index()
		{
			// HEADER
			$header['title'] = "Le Club des Critiques";
			$header['links'] = array();
			$this->load->view('structure/header', $header);

			// CONTENT
			$this->load->model('ParameterService');
			$content['concept'] = $this->ParameterService->getHomeConcept();
			$content['highlights'] = $this->ParameterService->getHomeHighlights();
			$this->load->view('home/index', $content);

			// FOOTER
			$this->load->view('structure/footer');
		}
	}
?>