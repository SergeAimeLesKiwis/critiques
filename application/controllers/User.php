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
			$this->load->model('LoanService');

			if ($id == 0) $id = $_SESSION['user_id'];
			$user = $this->UserService->getUser($id, true);

			if ($user != null) {
				$content['user'] = $user;
				$content['loanStatus'] = $this->LoanService->getLoansStatus();

				$this->load->view('user/profile', $content);
			} else {
				$this->load->view('user/no_user');
			}

			// FOOTER
			$this->loadFooter();
		}
	}
?>