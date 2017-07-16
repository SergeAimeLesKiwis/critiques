<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Report_VM.php');

	class ReportService extends CI_Model {

		public function getReportsValueOfUser($user) {
			$this->load->model('UserService');

			$row = $this->db->select('SUM(rs.value) AS reports')
								->from('reports rp')
								->join('reasons rs', 'rs.id = rp.reason', 'inner')
								->where('rp.user', $user)
								->order_by('reported_at')
								->get()
								->row();

			return $row->reports;
		}

		public function getReportsOfUser($user) {
			$this->load->model('UserService');

			$result = $this->db->select('rp.reason, rs.name, rs.value, rp.reported_by, rp.reported_at')
								->from('reports rp')
								->join('reasons rs', 'rs.id = rp.reason', 'inner')
								->where('rp.user', $user)
								->order_by('reported_at')
								->get()
								->result();
			$reports = array();

			$warned = $this->db->where('user', $user)->where('action', 'warn')->get('actions')->row();
			$warned_at = isset($warned) ? $warned->action_at : null;
			$is_warned = false;

			foreach ($result as $row)
			{
				if ($warned_at != null && $warned_at < $row->reported_at && !$is_warned) {
					$line = new Report_VM();
					$line->id = 'warn';
					$line->reason = 'Averti';
					$line->value = date('d/m/Y - H:i:s', strtotime($warned_at));
					$reports[] = $line;
					$is_warned = true;
				}

				$report = new Report_VM();
				$report->id = $row->reason;
				$report->reason = $row->name;
				$report->value = $row->value;
				$report->reported_by = $this->UserService->getUser($row->reported_by);
				$report->reported_at = date('d/m/Y - H:i:s', strtotime($row->reported_at));

				$reports[] = $report;
			}

			if ($warned_at != null && !$is_warned) {
				$line = new Report_VM();
				$line->id = 'warn';
				$line->reason = 'Averti';
				$line->value = date('d/m/Y - H:i:s', strtotime($warned_at));
				$reports[] = $line;
			}

			$banned = $this->db->where('user', $user)->where('action', 'ban')->get('actions')->row();
			$banned_at = isset($banned) ? $banned->action_at : null;
			if ($banned_at != null) {
				$line = new Report_VM();
				$line->id = 'ban';
				$line->reason = 'Banni';
				$line->value = date('d/m/Y - H:i:s', strtotime($warned_at));
				$reports[] = $line;
			}

			return $reports;
		}

		public function report_user($user, $reason) {
			return $this->db->set('user', $user)
							->set('reason', $reason)
							->set('reported_by', $_SESSION['user_id'])
							->set('reported_at', date('d/m/Y - H:i:s'))
							->insert('reports');
		}

		public function warn_user($user) {
			$this->db->set('group_id', 3)->where('user_id', $user)->update('users_groups');

			$this->db->set('user', $user)
					->set('action', 'Averti')
					->set('action_by', $_SESSION['user_id'])
					->set('action_at', date("Y-m-d H:i:s"))
					->insert('actions');
		}

		public function ban_user($user) {
			$this->db->where('active', 0)->where('admin', $user)->delete('rooms');

			$this->db->set('group_id', 4)->where('user_id', $user)->update('users_groups');

			$this->db->set('user', $user)
					->set('action', 'Banni')
					->set('action_by', $_SESSION['user_id'])
					->set('action_at', date("Y-m-d H:i:s"))
					->insert('actions');
		}
	}
?>