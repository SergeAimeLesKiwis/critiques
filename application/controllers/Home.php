<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');
	require_once(dirname(__FILE__).'/../libraries/AppConfig.php');

	class Home extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$this->loadHeader('Le Club des Critiques');

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);

			$this->load->view('home/index', $content);

			// FOOTER
			$this->loadFooter(array('scripts/home'));
		}

		public function statique($page) {
			// HEADER
			$this->loadHeader('Le Club des Critiques');

			// CONTENT
			$this->load->model('ParameterService');

			$static = $this->ParameterService->getStaticInfos($page);
			
			if (!empty($static['title']) && !empty($static['text'])) {
				$content['title'] = $static['title'];
				$content['text'] = $static['text'];
			} else {
				$content['title'] = 'Erreur';
				$content['text'] = 'La page que vous avez demandé n\'existe pas !';
			}

			$this->load->view('home/statique', $content);

			// FOOTER
			$this->loadFooter();
		}

		public function contact() {
			$this->load->library('mail_sender');

			if (isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['email'])) {
				$name = $_SESSION['first_name'].' '.$_SESSION['last_name'];
				$email = $_SESSION['email'];
			} else {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
			}

			$fromMail = $email;
			$fromName = $name;
			$to = AppConfig::getAppAdminEmail();
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$this->mail_sender->sendMail($fromMail, $fromName, $to, $subject, $message);
		}
	}
?>