<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Admin extends Base {

		public function __construct() {
			parent::__construct();

			if ($this->ion_auth->is_admin() === false) {
				redirect('home');
			}

			$this->page = 'Administration';
			$this->styles = array('styles/editable', 'styles/admin');
			$this->scripts = array('jquery.chained.min');

			$this->load->model('CategoryService');
			$this->load->model('ItemService');
			$this->load->model('PageService');
			$this->load->model('ParameterService');
			$this->load->model('ReportService');
			$this->load->model('RoomService');
			$this->load->model('TypeService');
		}

		public function index() {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$this->load->view('admin/index');

			// FOOTER
			$this->loadFooter();
		}

		public function load_link_modal() {
			$data['pages'] = $this->PageService->getAllPages();
			$this->load->view('admin/_add_link_modal', $data);
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

			$success_concept = $this->ParameterService->setHomeConcept($concept);
			if (!$success_concept) $this->error('Un problème est survenu lors de l\'enregistrement du concept');

			$success_highlights = $this->ParameterService->setHomeHighlights($highlights);
			if (!$success_highlights) $this->error('Un problème est survenu lors de l\'enregistrement de la une');

			return $success_concept && $success_highlights;
		}
//endregion

//region Pages
		public function load_admin_add_page() {
			$data['title'] = 'Création d\'une page';
			$data['url'] = 'add_page';
			$this->load->view('admin/pages/_index', $data);
		}

		public function load_admin_update_page() {
			$data['title'] = 'Modification d\'une page';
			$data['pages'] = $this->PageService->getAllPages();
			$this->load->view('admin/pages/_index', $data);
		}

		public function load_page() {
			$id = $this->input->post('key');

			if (isset($id) && $id > 0) {
				$page = $this->PageService->getPage($id);

				if ($page != null) {
					$data['page'] = $page;
					$data['url'] = 'update_page';
					$this->load->view('admin/pages/_form', $data);
				}
			}
		}

		public function add_page() {
			$name = $this->input->post('name');
			$label = $this->input->post('label');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if (empty($name)) {
				$this->error('Le nom ne peut être vide');
			} else if (empty($label)) {
				$this->error('Le label ne peut être vide');
			} else if (empty($title)) {
				$this->error('Le titre ne peut être vide');
			} else if (empty($text)) {
				$this->error('Le texte ne peut être vide');
			} else {
				$success = $this->PageService->addPage($name, $label, $title, $text);

				if (!$success) {
					$this->error('Une page portant ce nom existe déjà');
				}
			}
		}

		public function update_page() {
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$label = $this->input->post('label');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if (empty($id)) {
				$this->error('Veuillez choisir une page');
			} else if (empty($name)) {
				$this->error('Le nom ne peut être vide');
			} else if (empty($label)) {
				$this->error('Le label ne peut être vide');
			} else if (empty($title)) {
				$this->error('Le titre ne peut être vide');
			} else if (empty($text)) {
				$this->error('Le texte ne peut être vide');
			} else {
				$success = $this->PageService->updatePage($id, $name, $label, $title, $text);

				if (!$success) {
					$this->error('Une page portant ce nom existe déjà');
				}
			}
		}

		public function delete_page() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir une page');
			} else {
				$success = $this->PageService->deletePage($id);

				if (!$success) {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
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
				$success = $this->TypeService->addType($name);

				if ($success) {
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
				$success = $this->TypeService->updateType($id, $name);

				if ($success) {
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
				$success = $this->TypeService->deleteType($id);

				if ($success) {
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
				$success = $this->CategoryService->addCategory($name, $type);

				if ($success) {
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
				$success = $this->CategoryService->updateCategory($id, $name, $type);

				if ($success) {
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
				$success = $this->CategoryService->deleteCategory($id);

				if ($success) {
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

		public function load_item() {
			$id = $this->input->post('key');

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
			$image = $this->input->post('image');
			$description = $this->input->post('description');

			if (empty($title)) {
				$this->error('Le titre ne peut être vide');
			} else if (empty($author)) {
				$this->error('L\'auteur ne peut être vide');
			} else if (empty($publish_date)) {
				$this->error('La date de sortie ne peut être vide');
			} else if (empty($category)) {
				$this->error('La catégorie ne peut être vide');
			} else if (empty($image)) {
				$this->error('L\'image ne peut être vide');
			} else if (empty($description)) {
				$this->error('La description ne peut être vide');
			} else {
				$success = $this->ItemService->addItem($title, $author, $publish_date, $category, $image, $description);

				if (!$success) {
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
			$image = $this->input->post('image');
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
			} else if (empty($image)) {
				$this->error('L\'image ne peut être vide');
			} else if (empty($description)) {
				$this->error('La description ne peut être vide');
			} else {
				$success = $this->ItemService->updateItem($id, $title, $author, $publish_date, $category, $image, $description);

				if (!$success) {
					$this->error('Une oeuvre ayant ces informations existe déjà');
				}
			}
		}

		public function delete_item() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir une oeuvre');
			} else {
				$success = $this->ItemService->deleteItem($id);

				if (!$success) {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
		}
//endregion

//region Rooms
		public function load_admin_add_room() {
			$data['datalistItems'] = $this->ItemService->getDatalistItems();
			$this->load->view('admin/rooms/_add', $data);
		}

		public function load_admin_manage_rooms() {
			$data['pending'] = $this->RoomService->getPendingRooms();
			$data['actives'] = $this->RoomService->getActiveRooms();
			$this->load->view('admin/rooms/_manage', $data);
		}

		public function add_room() {
			$item = $this->input->post('item');
			$name = $this->input->post('name');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			if (empty($item)) {
				$this->error('Veuillez sélectionner une oeuvre valide');
			} else if (empty($name)) {
				$this->error('Le nom ne peut être vide');
			} else if (empty($start_date)) {
				$this->error('La date de début ne peut être vide');
			} else if (empty($end_date)) {
				$this->error('La date de fin ne peut être vide');
			} else {
				$success = $this->RoomService->addRoom($name, $_SESSION['user_id'], $item, $start_date, $end_date, 1);

				if (!$success) {
					$this->error('Un salon ayant ces informations existe déjà');
				}
			}
		}

		public function activate_room() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir un salon');
			} else {
				$success = $this->RoomService->activateRoom($id);

				if ($success) {
					$data['actives'] = $this->RoomService->getActiveRooms();
					$this->load->view('admin/rooms/_active_list', $data);
				} else {
					$this->error('Un problème est survenu lors de l\'activation');
				}
			}
		}

		public function delete_room() {
			$id = $this->input->post('id');

			if (empty($id)) {
				$this->error('Veuillez choisir un salon');
			} else {
				$success = $this->RoomService->deleteRoom($id);

				if (!$success) {
					$this->error('Un problème est survenu lors de la suppression');
				}
			}
		}
//endregion

//region Users
		public function load_admin_users() {
			$data['users'] = $this->UserService->getUserList();
			$this->load->view('admin/users/_index', $data);
		}

		public function show_reports() {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$data['reports'] = $this->ReportService->getReportsOfUser($id);
				$this->load->view('admin/users/_show_reports', $data);
			} else {
				$this->error('Veuillez choisir un utilisateur');
			}
		}

		public function warn() {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$this->ReportService->warn_user($id);
				$data['user'] = $this->UserService->getUser($id);
				$this->load->view('admin/users/_user', $data);
			} else {
				$this->error('Veuillez choisir un utilisateur');
			}
		}

		public function ban() {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$this->ReportService->ban_user($id);
				$data['user'] = $this->UserService->getUser($id);
				$this->load->view('admin/users/_user', $data);
			} else {
				$this->error('Veuillez choisir un utilisateur');
			}
		}
//endregion
	}
?>