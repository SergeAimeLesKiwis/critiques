<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Item extends Base {

		public function __construct() {
			parent::__construct();

			$this->page = 'Contenus';
			$this->scripts = array('jquery.chained.min', 'scripts/items');

			$this->load->model('CategoryService');
			$this->load->model('ItemService');
			$this->load->model('LoanService');
			$this->load->model('RoomService');
			$this->load->model('TypeService');
		}

		public function index() {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$search = $this->input->post('search');
			$searchTitle = $this->input->post('searchTitle');
			$searchAuthor = $this->input->post('searchAuthor');
			$searchType = substr($this->input->post('searchType'), 2);
			$searchCategory = substr($this->input->post('searchCategory'), 2);

			$data['search'] =  $search;
			$data['searchTitle'] =  $searchTitle;
			$data['searchAuthor'] =  $searchAuthor;
			$data['searchType'] =  $searchType;
			$data['searchCategory'] =  $searchCategory;

			$data['types'] = $this->TypeService->getAllTypes();
			$data['categories'] = $this->CategoryService->getAllCategories();
			$data['datalistItems'] = $this->ItemService->getDatalistItems();

			if (isset($search)) {
				$data['items'] = $this->ItemService->getFilteredItems($searchTitle, $searchAuthor, $searchType, $searchCategory);
			} else {
				$data['items'] = array();
			}

			$this->load->view('item/index', $data);

			// FOOTER
			$this->loadFooter();
		}

		public function load_infos_modal() {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$item = $this->ItemService->getItem($id);
				$data['item'] = $item;
				$data['suggestions'] = $this->ItemService->getSuggestions($item->id, $item->category->id);
				$this->load->view('item/_infos_modal', $data);
			}
		}

		public function grade() {
			$item = $this->input->post('item');
			$value = $this->input->post('value');

			if (!empty($item) && !empty($value)) {
				$success = $this->ItemService->gradeItem($item, $value);

				if ($success) {
					$data['grades'] = $this->ItemService->getItemGrades($item);
					$this->load->view('item/_grades', $data);
				} else {
					$this->error('Un problème est survenu lors de la notation');
				}
			}
		}

		public function users($id) {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$item = $this->ItemService->getItem($id);

			if ($item != null) {
				$data['item'] = $item;
				$data['users'] = $this->LoanService->getUsersWithItemAvailable($item->id);
			}

			$this->load->view('item/users', $data);

			// FOOTER
			$this->loadFooter();
		}

		public function rooms($id) {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$item = $this->ItemService->getItem($id);

			if ($item != null) {
				$data['item'] = $item;
				$data['rooms'] = $this->RoomService->getNotOverRoomsOfItem($item->id);
			}

			$this->load->view('item/rooms', $data);

			// FOOTER
			$this->loadFooter();
		}
	}
?>