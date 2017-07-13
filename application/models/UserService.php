<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/User_VM.php');

	class UserService extends CI_Model {

		public function getUser($id) {
			$row = $this->db->where('id', $id)->get('users')->row();

			if (isset($row)) {
				$user = new User_VM();
				$user->id = $row->id;
				$user->username = $row->username;
				$user->email = $row->email;
				$user->first_name = $row->first_name;
				$user->last_name = $row->last_name;
				$user->description = $row->description;
				$user->loans = $this->getLoans($row->id);

				return $user;
			}

			return null;
		}

		public function getLoans($id) {
			$this->load->model('ItemService');

			$result = $this->db->select('item')->where('user', $id)->order_by('RAND()')->limit(4)->get('loans')->result();

			$loans = array();

			foreach ($result as $row)
			{
				$loans[] = $this->ItemService->getItem($row->item);
			}

			return $loans;
		}
	}
?>