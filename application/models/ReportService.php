<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Report_VM.php');

	class ReportService extends CI_Model {

		public function getReportsOfUser($user) {
			$this->load->model('UserService');

			$result = $this->db->select('rp.reason, rs.name, rs.value, rp.reported_by, rp.reported_at')
								->from('reports rp')
								->join('reasons rs', 'rs.id = rp.reason', 'inner')
								->where('rp.user', $user)
								->where('rp.active', 1)
								->get()
								->result();

			$reports = array();

			foreach ($result as $row)
			{
				$report = new Report_VM();
				$report->id = $row->reason;
				$report->reason = $row->name;
				$report->value = $row->value;
				$report->reported_by = $this->UserService->getUser($row->reported_by);
				$report->reported_at = date('d/m/Y', strtotime($row->reported_at));

				$reports[] = $report;
			}

			return $reports;
		}
	}
?>