<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../libraries/AppConfig.php');

	class Home extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = "Le Club des Critiques";
			$header['styles'] = array();
			$this->load->view('shared/header', $header);

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);

			$this->load->view('home/index', $content);

			// FOOTER
			$footer['scripts'] = array();
			$this->load->view('shared/footer', $footer);
		}

		public function contact() {
			$this->load->library('mail');

			$fromMail = ""/* GET USER EMAIL */;
			$fromName = ""/* GET USER NAME */;
			$to = AppConfig::getAppAdminEmail();
			$subject = ""/* GET MSG SUBJECT */;
			$message = ""/* GET MSG CONTENT */;


			$this->maillib->sendMail($fromMail, $fromName, $to, $subject, $message);
		}
	}
?>