<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Site extends Base {

		public function __construct() {
			parent::__construct();

			$this->load->model('ParameterService');
		}

		public function index($page = null) {
			// HEADER
			$this->loadHeader('Le Club des Critiques');

			// CONTENT
			$static = $this->ParameterService->getStaticInfos($page);
			
			if (!empty($static['title']) && !empty($static['text'])) {
				$content['title'] = $static['title'];
				$content['text'] = $static['text'];
			} else {
				$content['title'] = 'Erreur';
				$content['text'] = 'La page que vous avez demandé n\'existe pas !';
			}

			$this->load->view('site/index', $content);

			// FOOTER
			$this->loadFooter();
		}
	}
?>