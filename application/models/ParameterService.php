<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ParameterService extends CI_Model {

		public function getHomeConcept() {
			$row = $this->db->where('key', 'home_concept')->get('parameters')->row();

			return isset($row) ? $row->value : null;
		}

		public function setHomeConcept($concept) {
			return $this->db->set('value', $concept)->where('key', 'home_concept')->update('parameters');
		}

		public function getHomeHighlights() {
			$row = $this->db->where('key', 'home_highlights')->get('parameters')->row();

			return isset($row) ? explode('|', $row->value) : null;
		}

		public function setHomeHighlights($highlights) {
			return $this->db->set('value', $highlights)->where('key', 'home_highlights')->update('parameters');
		}
	}
?>