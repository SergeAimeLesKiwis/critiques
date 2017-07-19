<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class User extends Base {

		public function __construct() {
			parent::__construct();

			$this->page = 'Utilisateur';
			$this->scripts = array('scripts/user');

			$this->load->model('ItemService');
			$this->load->model('LoanService');
		}

		public function profile($id = 0) {
			// HEADER
			$this->loadHeader();

			// CONTENT
			if ($id == 0) $id = $_SESSION['user_id'];
			$user = $this->UserService->getUser($id, 'loans');

			if ($user != null) {
				$data['user'] = $user;
				$data['loanStatus'] = $this->LoanService->getLoansStatus();
				$data['all_items'] = $this->ItemService->getDatalistLoans($user->id);
				$this->load->view('user/profile', $data);
			} else {
				$data['message'] = 'Ooops, il semblerait que l\'utilisateur que vous recherchez n\'existe pas.';
				$this->load->view('errors/index', $data);
			}

			// FOOTER
			$this->loadFooter();
		}

		public function load_edit_modal() {
			$data['user'] = $this->UserService->getUser($_SESSION['user_id'], 'loans');
			$this->load->view('user/_edit_user_modal', $data);
		}

		public function update() {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$description = $this->input->post('description');

			if (empty($id)) {
				$this->error('Veuillez choisir un utilisateur');
			} else if (empty($username)) {
				$this->error('Le pseudo ne peut être vide');
			} else {
				$success = $this->UserService->updateUser($id, $username, $description);

				if (!$success) {
					$this->error('Ce pseudo est déjà utilisé');
				}
			}
		}

		public function contact() {
			$user_id = $this->input->post('user');
			$item_id = $this->input->post('item');

			$user = $this->UserService->getUser($user_id);
			$item = $this->ItemService->getItem($item_id);

			if ($user != null && $item != null) {
				$this->load->library('mail_sender');
				$from = array('name' => $_SESSION['first_name'].' '.$_SESSION['last_name'], 'email' => $_SESSION['email']);
				echo $this->mail_sender->contact_user($from, $user->email, $item);
			}
		}
	}
?>