<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Base extends CI_Controller {

		protected $page;
		protected $styles;
		protected $scripts;

		public function __construct() {
			parent::__construct();

			if (!($this instanceof Home) && !($this instanceof Auth) && !($this instanceof Banned) && !($this instanceof Page)) {
				if ($this->ion_auth->logged_in() === false) {
					redirect('home');
				} else {
					$this->load->model('UserService');
					$my_status = $this->UserService->getUserStatus($_SESSION['user_id']);

					if ($my_status === 'banned') {
						redirect('banned');
					}
				}
			}

			$this->page = 'Le Club des Critiques';
			$this->styles = array();
			$this->scripts = array();
		}

		protected function loadHeader() {
			$data['title'] = $this->page;
			$data['styles'] = $this->styles;
			$data['isLogged'] = $this->ion_auth->logged_in();
			$data['isAdmin'] = $this->ion_auth->is_admin();

			//TODO: get static pages
			
			$this->load->view('shared/structure/header', $data);
		}

		protected function loadFooter() {
			$data['scripts'] = $this->scripts;
			$data['loadAdmin'] = $this->page == 'Administration';

			$this->load->view('shared/structure/footer', $data);
		}

		protected function error($message) {
			$this->output->set_status_header('400');
			echo $message;
		}
	}
?>