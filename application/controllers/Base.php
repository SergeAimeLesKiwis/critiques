<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Base extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		protected function loadHeader($title, $styles = array()) {
			$data['title'] = $title;
			$data['styles'] = $styles;
			$data['isLogged'] = $this->ion_auth->logged_in();
			$data['isAdmin'] = $this->ion_auth->is_admin();

			//TODO: get static pages
			
			$this->load->view('shared/header', $data);
		}

		protected function loadFooter($scripts = array(), $loadAdmin = false) {
			$data['scripts'] = $scripts;
			$data['loadAdmin'] = $loadAdmin;

			$this->load->view('shared/footer', $data);
		}

		protected function error($message) {
			$this->output->set_status_header('400');
			echo $message;
		}
	}
?>