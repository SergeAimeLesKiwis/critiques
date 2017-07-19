<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/Base.php');

	class Room extends Base {

		public function __construct() {
			parent::__construct();

			$this->page = 'Salons';
			$this->styles = array('styles/chat');
			$this->scripts = array('socket', 'scripts/chat');

			$this->load->model('ChatService');
			$this->load->model('RoomService');
			$this->load->model('UserService');
		}

		public function can_join() {
			$item = $this->input->post('item');

			if (!empty($item)) {
				$success = $this->UserService->hasGraded($item);

				if (!$success) {
					$this->error('Vous devez d\'abord voter avant de participer au salon');
				}
			} else {
				$this->error('Veuillez choisir une oeuvre');
			}
		}

		public function chat($id) {
			// HEADER
			$this->loadHeader();

			// CONTENT
			$data['user'] = $this->UserService->getUser($_SESSION['user_id']);
			$data['room'] = $this->RoomService->getRoom($id);
			$data['messages'] = $this->ChatService->getChatMessages($id);
			//TODO: get current participants

			$this->load->view('room/chat', $data);

			// FOOTER
			$this->loadFooter();
		}

		public function send() {
			$user = $this->input->post('user');
			$room = $this->input->post('room');
			$content = $this->input->post('content');

			$success = $this->ChatService->send_message($user, $room, $content);

			if (!$success) {
				$this->error('Vous n\'avez pas les droits nécessaires');
			}
		}

		public function load_report_modal() {
			$user = $this->input->post('user');
			$data['user'] = $this->PageService->getAllPages();
			$data['reason'] = $this->PageService->getAllPages();
			$this->load->view('admin/_add_link_modal', $data);
		}

		public function report() {

		}
	}
?>