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
				$message->user = $this->UserService->getUser($row->user, null, false);
				$message->date = $row->date;
				$message->content = $row->content;

				$messages[] = $message;
			}

			return $messages;
		}

		public function ban_user($user, $room) {
			return $this->db->set('user', $user)->set('room', $room)->insert('excluded');
		}

		public function is_banned($user, $room) {
			return $this->db->where('user', $user)->where('room', $room)->get('excluded')->num_rows() > 0;
		}

		public function send_message($user, $room, $content) {
			return !$this->is_banned($user, $room)
				&& $this->db->set('user', $user)
							->set('room', $room)
							->set('content', $content)
							->set('date', date("Y-m-d H:i:s"))
							->insert('messages');
		}
	}
?>