<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ParameterService extends CI_Model {

		protected $table = "parameters";

		private $key;
		private $value;

		public function getHomeConcept() {
			$query = $this->db->get_where($this->table, 'key = \'home_concept\'');
			$row = $query->row();

			return isset($row) ? $row->value : null;
		}

		public function setHomeConcept($concept) {
			$this->key = 'home_concept';
			$this->value = $concept;

			$this->db->update($this->table, $this, 'key ='.$this->key);
		}

		public function getHomeHighlights() {
			$query = $this->db->get_where($this->table, 'key = \'home_highlights\'');
			$row = $query->row();

			return isset($row) ? explode('|', $row->value) : null;
		}

		public function setHomeHighlights($highlights) {
			$this->key = 'home_highlights';
			$this->value = $highlights;

			$this->db->update($this->table, $this, 'key ='.$this->key);
		}
	}
?>