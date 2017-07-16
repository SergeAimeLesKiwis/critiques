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
								->limit(4)
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
	}
?>