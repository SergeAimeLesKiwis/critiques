<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = "Contenus";
			$header['links'] = array('<script type="text/javascript" src="'.base_url().'assets/js/scripts/admin.js"></script>');

			$this->load->view('shared/header', $header);

			// CONTENT
			$this->load->model('ParameterService');
			$content['concept'] = $this->ParameterService->getHomeConcept();
			$content['highlights'] = $this->ParameterService->getHomeHighlights();

			$this->load->model('ItemService');
			$content['items'] = $this->ItemService->getItems();

			$this->load->view('admin/index', $content);

			// FOOTER
			$this->load->view('shared/footer');
		}

		public function save_home() {
			$concept = $this->input->post('concept');
			$highlights = $this->input->post('highlights');

			$this->load->model('ParameterService');
			$this->ParameterService->setHomeConcept($concept);
			$this->ParameterService->setHomeHighlights($highlights);

			redirect('admin/index', 'refresh');
		}
	}
?>