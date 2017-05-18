<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ParameterService extends CI_Model {

		protected $table = "parameters";

		public function getHomeConcept() {
			$query = $this->db->get_where($this->table, 'key = \'home_concept\'');
			$row = $query->row();

			return isset($row) ? $row->value : null;
		}

		public function getHomeHighlights() {
			$query = $this->db->get_where($this->table, 'key = \'home_highlights\'');
			$row = $query->row();

			return isset($row) ? explode('|', $row->value) : null;
		}
	}
?>