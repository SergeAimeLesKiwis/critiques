<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Base extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		protected function loadHeader($title, $styles = array()) {
			$header['title'] = $title;
			$header['styles'] = $styles;

			//TODO: get static pages
			
			$this->load->view('shared/header', $header);
		}

		protected function loadFooter($scripts = array()) {
			$footer['scripts'] = $scripts;
			$this->load->view('shared/footer', $footer);
		}

		protected function error($message) {
			$this->output->set_status_header('400');
			echo $message;
		}
	}
?>