<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Item extends Base {

		public function __construct() {
			parent::__construct();

			$this->load->model('CategoryService');
			$this->load->model('ItemService');
			$this->load->model('TypeService');
		}

		public function index() {
			// HEADER
			$this->loadHeader('Contenus');

			// CONTENT
			$search = $this->input->post('search');
			$searchTitle = $this->input->post('searchTitle');
			$searchAuthor = $this->input->post('searchAuthor');
			$searchType = substr($this->input->post('searchType'), 2);
			$searchCategory = substr($this->input->post('searchCategory'), 2);

			$content['search'] =  $search;
			$content['searchTitle'] =  $searchTitle;
			$content['searchAuthor'] =  $searchAuthor;
			$content['searchType'] =  $searchType;
			$content['searchCategory'] =  $searchCategory;

			$content['types'] = $this->TypeService->getAllTypes();
			$content['categories'] = $this->CategoryService->getAllCategories();
			$content['datalistItems'] = $this->ItemService->getDatalistItems();

			if (isset($search)) {
				$content['items'] = $this->ItemService->getFilteredItems($searchTitle, $searchAuthor, $searchType, $searchCategory);
			} else {
				$content['items'] = array();
			}

			$this->load->view('item/index', $content);

			// FOOTER
			$this->loadFooter(array('jquery.chained.min', 'scripts/items'));
		}

		public function load_infos_modal() {
			$id = $this->input->post('id');

			if (!empty($id)) {
				$item = $this->ItemService->getItem($id);
				$suggestions = $this->ItemService->getSuggestions($item->id, $item->category->id);
				$this->load->view('item/_infos_modal', array('item' => $item, 'suggestions' => $suggestions));
			}
		}
	}
?>