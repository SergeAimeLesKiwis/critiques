<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/LoanStatus_VM.php');

	class LoanService extends CI_Model {

		public function getLoansStatus() {
			$result = $this->db->get('loan_status')->result();
			$status = array();

			foreach ($result as $row)
			{
				$loan_status = new LoanStatus_VM();
				$loan_status->name = $row->name;
				$loan_status->color = $row->color;

				$status[] = $loan_status;
			}

			return $status;
		}

		public function getLoansOfUser($user) {
			$this->load->model('ItemService');

			$result = $this->db->select('l.item, ls.color')
								->from('loans l')
								->join('loan_status ls', 'ls.id = l.status', 'inner')
								->where('l.user', $user)
								->order_by('RAND()')
								->limit(3)
								->get()
								->result();
			$items = array();

			foreach ($result as $row)
			{
				$loan_status = new LoanStatus_VM();
				$loan_status->color = $row->color;
				$item = $this->ItemService->getItem($row->item);
				$item->loan_status = $loan_status;

				$items[] = $item;
			}

			return $items;
		}

		public function getUsersWithItemAvailable($item) {
			$this->load->model('UserService');

			$result = $this->db->select('u.id')
								->from('users u')
								->join('loans l', 'l.user = u.id', 'inner')
								->where('l.item', $item)
								->where('l.status', 1)
								->order_by('RAND()')
								->get()
								->result();
			$users = array();

			foreach ($result as $row)
			{
				$users[] = $this->UserService->getUser($row->id);
			}

			return $users;
		}
	}
?>