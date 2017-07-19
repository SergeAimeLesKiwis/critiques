<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Message_VM.php');

	class ChatService extends CI_Model {

		public function getChatMessages($room) {
			$this->load->model('UserService');

			$result = $this->db->where('room', $room)->order_by('date')->get('messages')->result();

			$messages = array();

			foreach ($result as $row)
			{
				$message = new Message_VM();
				$room->user = $this->UserService->getUser($row->user, null, false);
				$room->date = $row->date;
				$room->content = $row->content;

				$messages[] = $room;
			}

			return $messages;
		}
	}
?>