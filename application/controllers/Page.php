<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Page extends Base {

		public function __construct() {
			parent::__construct();

			$this->load->model('PageService');
		}

		public function index($name = null) {
			$page = $this->PageService->getPageByName($name);

			if ($page == null) {
				$page = new Page_VM();
				$page->label = 'Le Club des Critiques';
				$page->title = 'Erreur';
				$page->text = 'La page que vous avez demandé n\'existe pas !';
			}

			// HEADER
			$this->page = $page->label;
			$this->loadHeader();

			// CONTENT
			$data['page'] = $page;

			$this->load->view('page/index', $data);

			// FOOTER
			$this->loadFooter();
		}
	}
?>