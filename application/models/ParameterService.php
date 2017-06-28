<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ParameterService extends CI_Model {

		protected $table = "parameters";

		private $key;
		private $value;

		public function getHomeConcept() {
			return $this->getParameter('home_concept');
		}

		public function setHomeConcept($concept) {
			return $this->setParameter('home_concept', $concept);
		}

		public function getHomeHighlights() {
			$parameter = $this->getParameter('home_highlights')

			return $parameter != null ? explode('|', $parameter) : null;
		}

		public function setHomeHighlights($highlights) {
			return $this->setParameter('home_highlights', $highlights);
		}

		private function getParameter($key) {
			$query = $this->db->get_where($this->table, 'key ='.$this->key);
			$row = $query->row();

			return isset($row) ? $row->value : null;
		}

		private function setParameter($key, $value) {
			$this->key = $key;
			$this->value = $value;

			$this->db->update($this->table, $this, 'key ='.$this->key);
		}
	}
?>

1, 2, 3, 0, 17, 18
1|2|3|0|17|18