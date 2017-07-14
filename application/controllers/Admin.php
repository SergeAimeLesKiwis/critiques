<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Admin extends Base {

		public function __construct() {
			parent::__construct();

			// if ($this->ion_auth->is_admin() === false) {
			// 	redirect('home');
			// }

			$this->load->model('ParameterService');
			$this->load->model('ItemService');
			$this->load->model('TypeService');
			$this->load->model('CategoryService');
		}

		public function index() {
			// HEADER
			$this->loadHeader('Administration', array('styles/editable'));

			// CONTENT
			$this->load->view('admin/index');

			// FOOTER
			$this->loadFooter(array('jquery.chained.min', 'scripts/editable'), true);
		}

//region Home
		public function load_admin_home() {
			$data['concept'] = $this->ParameterService->getHomeConcept();
			$highlights = $this->ParameterService->getHomeHighlights();
			$data['highlights'] = $this->ItemService->getItems($highlights);
			$data['datalistItems'] = $this->ItemService->getDatalistItems();

			$this->load->view('admin/home/_index', $data);
		}

		public function refresh_highlight() {
			$id = $this->input->post('id');
			$position = $this->input->post('position');

			if (isset($id) && !empty($position)) {
				$item = $this->ItemService->getItem($id);

				$this->load->view('admin/home/_highlight_container', array('item' => $item, 'position' => $position));
			}
		}

		public function save_home() {
			$concept = $this->input->post('concept');
			$highlights = $this->input->post('highlights');

			$updated_concept = $this->ParameterService->setHomeConcept($concept);
			if (!$updated_concept) $this->error('Un problème est survenu lors de l\'enregistrement du concept');

			$updated_highlights = $this->ParameterService->setHomeHighlights($highlights);
			if (!$updated_highlights) $this->error('Un problème est survenu lors de l\'enregistrement de la une');

			return $updated_concept && $updated_highlights;
		}
//endregion

//region Static
		public function load_admin_static() {
			$static = array();

			$this->load->view('admin/static/_index', $static);
		}
//endregion

//region Types Categories
		public function load_admin_types_categories() {
			$data['types'] = $this->TypeService->getAllTypes();
			$data['categories'] = $this->CategoryService->getAllCategories();

			$this->load->view('admin/types_categories/_index', $data); 
		}

		public function load_type_modal() {
			$id = $this->input->post('id');

			if (isset($id)) {
				if ($id > 0) {
					$type = $this->TypeService->getType($id);
					$this->load->view('admin/types_categories/_type_edit_modal', array('type' => $type));
				} else {
					$this->load->view('admin/types_categories/_type_new_modal');
				}
			}
		}

		public function add_type() {
			$name = $this->input->post('name');

			if (empty($name)) {
				$this->error('Le label ne peut être vide');
			} else {
				$added_type = $this->TypeService->addType($name);

				if ($added_type) {
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
				$updated_type = $this->TypeService->updateType($id, $name);

				if ($updated_type) {
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
				$deleted_type = $this->TypeService->deleteType($id);

				if ($deleted_type) {
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
				$types = $this->TypeService->getAllTypes();

				if ($id > 0) {
					$category = $this->CategoryService->getCategory($id);
					$this->load->view('admin/types_categories/_category_edit_modal', array('category' => $category, 'types' => $types));
				} else {
					$this->load->view('admin/types_categories/_category_new_modal', array('types' => $types));
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
				$added_category = $this->CategoryService->addCategory($name, $type);

				if ($added_category) {
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
				$updated_category = $this->CategoryService->updateCategory($id, $name, $type);

				if ($updated_category) {
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
				$deleted_category = $this->CategoryService->deleteCategory($id);

				if ($deleted_category) {
					$categories = $this->CategoryService->getAllCategories();
					$this->load->view('admin/types_categories/_category_list', array('categories' => $categories));
				} else {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
		}
//endregion

//region Items
		public function load_admin_add_item() {
			$data['title'] = 'Création d\'une oeuvre';
			$data['types'] = $this->TypeService->getAllTypes();
			$data['categories'] = $this->CategoryService->getAllCategories();
			$data['url'] = 'add_item';

			$this->load->view('admin/items/_index', $data);
		}

		public function load_admin_update_item() {
			$data['title'] = 'Modification d\'une oeuvre';
			$data['datalistItems'] = $this->ItemService->getDatalistItems();

			$this->load->view('admin/items/_index', $data);
		}

		public function load_link_modal() {
			$this->load->view('admin/items/_add_link');
		}

		public function load_item() {
			$id = $this->input->post('id');

			if (isset($id) && $id > 0) {
				$item = $this->ItemService->getItem($id);

				if ($item != null) {
					$data['item'] = $item;
					$data['types'] = $this->TypeService->getAllTypes();
					$data['categories'] = $this->CategoryService->getAllCategories();
					$data['url'] = 'update_item';

					$this->load->view('admin/items/_form', $data);
				}
			}
		}

		public function add_item() {
			$title = $this->input->post('title');
			$author = $this->input->post('author');
			$publish_date = $this->input->post('publish_date');
			$category = substr($this->input->post('category'), 2);
			$description = $this->input->post('description');

			if (empty($title)) {
				$this->error('Le titre ne peut être vide');
			} else if (empty($author)) {
				$this->error('L\'auteur ne peut être vide');
			} else if (empty($publish_date)) {
				$this->error('La date de sortie ne peut être vide');
			} else if (empty($category)) {
				$this->error('La catégorie ne peut être vide');
			} else if (empty($description)) {
				$this->error('La description ne peut être vide');
			} else {
				$added_item = $this->ItemService->addItem($title, $author, $publish_date, $category, $description);

				if (!$added_item) {
					$this->error('Une oeuvre ayant ces informations existe déjà');
				}
			}
		}

		public function update_item() {
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$author = $this->input->post('author');
			$publish_date = $this->input->post('publish_date');
			$category = substr($this->input->post('category'), 2);
			$description = $this->input->post('description');

			if (empty($id)) {
				$this->error('Veuillez choisir une oeuvre');
			} else if (empty($title)) {
				$this->error('Le titre ne peut être vide');
			} else if (empty($author)) {
				$this->error('L\'auteur ne peut être vide');
			} else if (empty($publish_date)) {
				$this->error('La date de sortie ne peut être vide');
			} else if (empty($category)) {
				$this->error('La catégorie ne peut être vide');
			} else if (empty($description)) {
				$this->error('La description ne peut être vide');
			} else {
				$updated_item = $this->ItemService->updateItem($id, $title, $author, $publish_date, $category, $description);

				if (!$updated_item) {
					$this->error('Une oeuvre ayant ces informations existe déjà');
				}
			}
		}
//endregion

//region Rooms
		public function load_admin_rooms() {
			$data = array();

			$this->load->view('admin/rooms/_index', $data);
		}
//endregion

//region Users
		public function load_admin_users() {
			$data = array();

			$this->load->view('admin/users/_index', $data);
		}
//endregion
	}
?>