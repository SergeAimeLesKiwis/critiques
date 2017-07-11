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
			$this->loadFooter(array('scripts/admin', 'toastr.min'));
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

		public function load_type_modal($id) {
			if ($id > 0) {
				$this->load->model('TypeService');
				$type = $this->TypeService->getType($id);
				$this->load->view('admin/types_categories/_type_modal_edit', array('type' => $type));
			} else {
				$this->load->view('admin/types_categories/_type_modal_new');
			}
		}

		public function add_type() {
			$name = $this->input->post('name');

			if (!empty($name)) {
				$this->load->model('TypeService');
				$addedType = $this->TypeService->addType($name);

				if ($addedType) {
					$types = $this->TypeService->getAllTypes();
					$this->load->view('admin/types_categories/_type_list', array('types' => $types));
				} else {
					$this->fieldExists();
				}
			} else {
				$this->fieldCantBeEmpty();
			}
		}

		public function update_type() {
			$id = $this->input->post('id');
			$name = $this->input->post('name');

			if (!empty($name)) {
				$this->load->model('TypeService');
				$updatedType = $this->TypeService->updateType($id, $name);

				if ($updatedType) {
					$type = $this->TypeService->getType($id);
					$this->load->view('admin/types_categories/_type_line', array('type' => $type));
				} else {
					$this->fieldExists();
				}
			} else {
				$this->fieldCantBeEmpty();
			}
		}

		private function fieldExists() {
			$this->output->set_status_header('400');
			echo "Un type portant ce nom existe déjà !";
		}

		private function fieldCantBeEmpty() {
			$this->output->set_status_header('400');
			echo "Le label ne peut être vide !";
		}
	}
?>