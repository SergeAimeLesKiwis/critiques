<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = 'Administration';
			$header['styles'] = array();
			$this->load->view('shared/header', $header);

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);
			$content['items'] = $this->ItemService->getAllItems();

			$this->load->view('admin/index', $content);

			// FOOTER
			$footer['scripts'] = array('scripts/admin');
			$this->load->view('shared/footer', $footer);
		}

		public function refreshHighlight($id, $position) {
			$this->load->model('ItemService');
			$item = $this->ItemService->getItem($id);

			$this->load->view('admin/_highlight_container', array('item' => $item, 'position' => $position));
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