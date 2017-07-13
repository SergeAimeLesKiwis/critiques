<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Admin extends Base {

		public function __construct() {
			parent::__construct();

			// if ($this->ion_auth->is_admin() === false) {
			// 	redirect('home');
			// }
		}

		public function index() {
			// HEADER
			$this->loadHeader('Administration', array('bootstrap-editable'));

			// CONTENT
			$this->load->model('ParameterService');
			$this->load->model('ItemService');
			$this->load->model('TypeService');
			$this->load->model('CategoryService');

			$content['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$content['highlights'] = $this->ItemService->getItems($highlights);
			$content['datalistItems'] = $this->ItemService->getDatalistItems();

			$content['static'] = $this->TypeService->getAllTypes();

			$content['types'] = $this->TypeService->getAllTypes();
			$content['categories'] = $this->CategoryService->getAllCategories();

			$this->load->view('admin/index', $content);

			// FOOTER
			$this->loadFooter(array('jquery.chained.min'), true);
		}

// HOME

		public function refreshHighlight() {
			$id = $this->input->post('id');
			$position = $this->input->post('position');

			if (isset($id) && !empty($position)) {
				$this->load->model('ItemService');
				$item = $this->ItemService->getItem($id);

				$this->load->view('admin/home/_highlight_container', array('item' => $item, 'position' => $position));
			}
		}

		public function save_home() {
			$concept = $this->input->post('concept');
			$highlights = $this->input->post('highlights');

			$this->load->model('ParameterService');

			$updatedConcept = $this->ParameterService->setHomeConcept($concept);
			if (!$updatedConcept) $this->error('Un problème est survenu lors de l\'enregistrement du concept');

			$updatedHighlights = $this->ParameterService->setHomeHighlights($highlights);
			if (!$updatedHighlights) $this->error('Un problème est survenu lors de l\'enregistrement de la une');

			return $updatedConcept && $updatedHighlights;
		}

// STATIC

// TYPES CATEGORIES

		public function load_type_modal() {
			$id = $this->input->post('id');

			if (isset($id)) {
				if ($id > 0) {
					$this->load->model('TypeService');
					$type = $this->TypeService->getType($id);
					$this->load->view('admin/types_categories/_type_modal_edit', array('type' => $type));
				} else {
					$this->load->view('admin/types_categories/_type_modal_new');
				}
			}
		}

		public function add_type() {
			$name = $this->input->post('name');

			if (empty($name)) {
				$this->error('Le label ne peut être vide');
			} else {
				$this->load->model('TypeService');
				$addedType = $this->TypeService->addType($name);

				if ($addedType) {
					$types = $this->TypeService->getAllTypes();
					$this->load->view('admin/types_categories/_type_list', array('types' => $types));
				} else {
					$this->error('Un type portant ce nom existe déjà');
				}
			}
		}

		public function update_type() {
			$id = $this->input->post('id');
			$name = $this->input->post('name');

			if (empty($id)) {
				$this->error('Veuillez choisir un type');
			} else if (empty($name)) {
				$this->error('Le label ne peut être vide');
			} else {
				$this->load->model('TypeService');
				$updatedType = $this->TypeService->updateType($id, $name);

				if ($updatedType) {
					$type = $this->TypeService->getType($id);
					echo $type->name;
				} else {
					$this->error('Un type portant ce nom existe déjà');
				}
			}
		}

		public function delete_type() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir un type');
			} else {
				$this->load->model('TypeService');
				$deletedType = $this->TypeService->deleteType($id);

				if ($deletedType) {
					$types = $this->TypeService->getAllTypes();
					$this->load->view('admin/types_categories/_type_list', array('types' => $types));
				} else {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
		}

		public function load_category_modal() {
			$id = $this->input->post('id');

			if (isset($id)) {
				$this->load->model('TypeService');
				$types = $this->TypeService->getAllTypes();

				if ($id > 0) {
					$this->load->model('CategoryService');
					$category = $this->CategoryService->getCategory($id);
					$this->load->view('admin/types_categories/_category_modal_edit', array('category' => $category, 'types' => $types));
				} else {
					$this->load->view('admin/types_categories/_category_modal_new', array('types' => $types));
				}
			}
		}

		public function add_category() {
			$name = $this->input->post('name');
			$type = $this->input->post('type');

			if (empty($name)) {
				$this->error('Le label ne peut être vide');
			} else if (empty($type)) {
				$this->error('Le type ne peut être vide');
			} else {
				$this->load->model('CategoryService');
				$addedCategory = $this->CategoryService->addCategory($name, $type);

				if ($addedCategory) {
					$categories = $this->CategoryService->getAllCategories();
					$this->load->view('admin/types_categories/_category_list', array('categories' => $categories));
				} else {
					$this->error('Une catégorie portant ce nom existe déjà');
				}
			}
		}

		public function update_category() {
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$type = $this->input->post('type');

			if (empty($id)) {
				$this->error('Veuillez choisir une catagorie');
			} else if (empty($name)) {
				$this->error('Le label ne peut être vide');
			} else if (empty($type)) {
				$this->error('Le type ne peut être vide');
			} else {
				$this->load->model('CategoryService');
				$updatedCategory = $this->CategoryService->updateCategory($id, $name, $type);

				if ($updatedCategory) {
					$category = $this->CategoryService->getCategory($id);
					echo $category->name;
				} else {
					$this->error('Une catégorie portant ce nom et ayant ce type existe déjà');
				}
			}
		}

		public function delete_category() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir une catagorie');
			} else {
				$this->load->model('CategoryService');
				$deletedCategory = $this->CategoryService->deleteCategory($id);

				if ($deletedCategory) {
					$categories = $this->CategoryService->getAllCategories();
					$this->load->view('admin/types_categories/_category_list', array('categories' => $categories));
				} else {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
		}
	}
?>