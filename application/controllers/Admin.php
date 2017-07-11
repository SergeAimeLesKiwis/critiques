<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Admin extends Base {

		public function __construct() {
			parent::__construct();

			// if ($this->ion_auth->is_admin () === FALSE) {
			// 	redirect('home');
			// }
		}

		public function index() {
			// HEADER
			$this->loadHeader('Administration', array('bootstrap-editable', 'toastr.min'));

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');
			$this->load->model('TypeService');
			$this->load->model('CategoryService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);
			$content['items'] = $this->ItemService->getAllItems();

			$content['static'] = $this->TypeService->getAllTypes();

			$content['types'] = $this->TypeService->getAllTypes();
			$content['categories'] = $this->CategoryService->getAllCategories();

			$this->load->view('admin/index', $content);

			// FOOTER
			$this->loadFooter(array('bootstrap-editable', 'scripts/admin', 'toastr.min'));
		}
// HOME
		public function refreshHighlight($id, $position) {
			$this->load->model('ItemService');
			$item = $this->ItemService->getItem($id);

			$this->load->view('admin/home/_highlight_container', array('item' => $item, 'position' => $position));
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
		public function add_type() {
			$name = $this->input->post('type_name');

			if (!empty($name)) {
				$this->load->model('TypeService');
				$addedType = $this->TypeService->addType($name);

				if ($addedType) {
					$types = $this->TypeService->getAllTypes();
					$this->load->view('admin/types_categories/_type_list', array('types' => $types));
				}
			}

			//TODO: add failed or name empty
		}

		public function update_type() {
			$id = $this->input->post('type_id');
			$name = $this->input->post('type_name');

			if (!empty($name)) {
				$this->load->model('TypeService');
				$updatedType = $this->TypeService->updateType($id, $name);

				if ($updatedType) {
					$type = $this->TypeService->getType($id);
					$this->load->view('admin/types_categories/_type_line', array('type' => $type));
				}
			}

			//TODO: add failed or name empty
		}
	}
?>