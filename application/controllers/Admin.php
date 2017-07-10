<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$header['title'] = 'Administration';
			$header['styles'] = array('bootstrap-editable', 'toastr.min');
			$this->load->view('shared/header', $header);

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');
			$this->load->model('TypeService');
			$this->load->model('CategoryService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);
			$content['items'] = $this->ItemService->getAllItems();

			$content['types'] = $this->TypeService->getAllTypes();
			$content['categories'] = $this->CategoryService->getAllCategories();

			$this->load->view('admin/index', $content);

			// FOOTER
			$footer['scripts'] = array('bootstrap-editable', 'scripts/admin', 'toastr.min');
			$this->load->view('shared/footer', $footer);
		}
// HOME
		public function refreshHighlight($id, $position) {
			$this->load->model('ItemService');
			$item = $this->ItemService->getItem($id);

			$this->load->view('admin/_highlight_container', array('item' => $item, 'position' => $position));
		}

		public function save_home() {
			$concept = $this->input->post('concept');
			$highlights = $this->input->post('highlights');

			$this->load->model('ParameterService');
			$updatedConcept = $this->ParameterService->setHomeConcept($concept);
			$updatedHighlights = $this->ParameterService->setHomeHighlights($highlights);

			return $updatedConcept && $updatedHighlights;
		}

// STATIC

// TYPES CATEGORIES
		public function edit_type() {
			$id = $this->input->post('pk');
			$name = $this->input->post('value');

			if (!empty($name)) {
				$this->load->model('TypeService');
				$this->TypeService->setType($id, $name);
			} else {
				header('HTTP/1.0 400 Bad Request', true, 400);
				echo "This field is required!";
			}
		}
	}
?>