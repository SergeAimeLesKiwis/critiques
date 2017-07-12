<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Item extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			// HEADER
			$this->loadHeader('Administration');

			// CONTENT
			$this->load->model('TypeService');
			$this->load->model('CategoryService');
			$this->load->model('ItemService');

			$searchTitle = $this->input->post('searchTitle');
			$searchAuthor = $this->input->post('searchAuthor');
			$searchType = substr($this->input->post('searchType'), 2);
			$searchCategory = substr($this->input->post('searchCategory'), 2);

			$content['searchTitle'] =  $searchTitle;
			$content['searchAuthor'] =  $searchAuthor;
			$content['searchType'] =  $searchType;
			$content['searchCategory'] =  $searchCategory;

			$content['types'] = $this->TypeService->getAllTypes();
			$content['categories'] = $this->CategoryService->getAllCategories();

			$content['allItems'] = $this->ItemService->getAllItems();
			$content['items'] = $this->ItemService->getFilteredItems($searchTitle, $searchAuthor, $searchType, $searchCategory);

			$this->load->view('item/index', $content);

			// FOOTER
			$this->loadFooter(array('jquery.chained.min', 'scripts/items'));
		}

		public function load_infos_modal {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$this->load->model('ItemService');
				$item = $this->ItemService->getItem($id);
				$this->load->view('item/_infos_modal', array('item' => $item));
			}
		}
	}
?>