<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/User_VM.php');

	class UserService extends CI_Model {

		private function exists($id, $username) {
			return $this->db->where('id !=', $id)->where('username', $username)->get('users')->num_rows() > 0;
		}

		public function updateUser($id, $username, $description) {
			return !$this->exists($id, $title, $category)
				&& $this->db->set('username', $username)
							->set('description', $description)
							->where('id', $id)
							->update('users');
		}

		public function getUser($id, $with = null, $only_active = true) {
			$row = $this->db->where('id', $id)->get('users')->row();

			if (isset($row)) {
				$this->load->model('ReportService');

				$user = new User_VM();
				$user->id = $row->id;
				$user->username = $row->username;
				$user->email = $row->email;
				$user->first_name = $row->first_name;
				$user->last_name = $row->last_name;
				$user->description = $row->description;
				$user->status = $this->getUserStatus($row->id);

				if ($with != null) {
					if ($with == 'loans') {
						$this->load->model('LoanService');
						$user->loans = $this->LoanService->getLoansOfUser($row->id);
					}
				}

				return $only_active ? ($user->status != 'banned' ? $user : null) : $user;
			}

			return null;
		}

		public function getUserList() {
			$this->load->model('ReportService');

			$result = $this->db->get('users')->result();
			$users = array();

			foreach ($result as $row)
			{
				$user = new User_VM();
				$user->id = $row->id;
				$user->username = $row->username;
				$user->email = $row->email;
				$user->first_name = $row->first_name;
				$user->last_name = $row->last_name;
				$user->reports = $this->ReportService->getReportsValueOfUser($row->id);
				$user->status = $this->getUserStatus($row->id);

				$users[] = $user;
			}

			return $users;
		}

		public function getUserStatus($user) {
			$row = $this->db->select('g.name')
							->from('groups g')
							->join('users_groups ug', 'ug.group_id = g.id', 'inner')
							->where('ug.user_id', $user)
							->get()
							->row();

			return isset($row) ? $row->name : null;
		}

		public function hasGraded($item) {
			return $this->db->where('user', $_SESSION['user_id'])->where('item', $item)->get('grades')->num_rows() > 0;
		}
	}
?>