<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Home extends Base {

		public function __construct() {
			parent::__construct();

			$this->scripts = array('scripts/home');

			$this->load->model('ItemService');
			$this->load->model('ParameterService');
		}

		public function index() {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$data['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$data['highlights'] = $this->ItemService->getItems($highlights);
			$this->load->view('home/index', $data);

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
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			echo $this->mail_sender->contact_admin($fromMail, $fromName, $subject, $message);
		}
	}
?>