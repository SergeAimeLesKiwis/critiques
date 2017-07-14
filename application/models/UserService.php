<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/User_VM.php');

	class UserService extends CI_Model {

		public function getUser($id, $withLoans = false) {
			$row = $this->db->where('id', $id)->get('users')->row();

			if (isset($row)) {
				$user = new User_VM();
				$user->id = $row->id;
				$user->username = $row->username;
				$user->email = $row->email;
				$user->first_name = $row->first_name;
				$user->last_name = $row->last_name;
				$user->description = $row->description;

				if ($withLoans) {
					$this->load->model('LoanService');
					$user->loans = $this->LoanService->getLoansOfUser($row->id);
				}

				return $user;
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
				$user->email = $row->email;
				$user->first_name = $row->first_name;
				$user->last_name = $row->last_name;
				$user->reports = $this->ReportService->getReportsOfUser($row->id);

				$users[] = $user;
			}

			return $users;
		}
	}
?>