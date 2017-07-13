<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class User extends Base {

		public function __construct() {
			parent::__construct();
		}

		public function profile($id = 0) {
			// HEADER
			$this->loadHeader('Utilisateur');

			// CONTENT
			$this->load->model('UserService');

			if ($id == 0) $id = /* SESSION USER ID HERE */ 0;
			$user = $this->UserService->getUser($id);

			if ($user != null) {
				$this->load->view('user/profile', array('user' => $user));
			} else {
				$this->load->view('user/no_user');
			}

			// FOOTER
			$this->loadFooter();
		}
	}
?>