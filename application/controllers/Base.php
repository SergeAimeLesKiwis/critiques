<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Base extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		protected function loadHeader($title, $styles = array()) {
			$header['title'] = $title;
			$header['styles'] = $styles;
			$header['isLogged'] = $this->ion_auth->logged_in();
			$header['isAdmin'] = $this->ion_auth->is_admin();

			//TODO: get static pages
			
			$this->load->view('shared/header', $header);
		}

		protected function loadFooter($scripts = array(), $loadAdmin = false) {
			$footer['scripts'] = $scripts;
			$footer['loadAdmin'] = $loadAdmin;
			$this->load->view('shared/footer', $footer);
		}

		protected function error($message) {
			$this->output->set_status_header('400');
			echo $message;
		}
	}
?>