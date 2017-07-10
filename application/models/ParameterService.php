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
			return $this->db->set('value', $concept)
							->where('key', 'home_concept')
							->update($this->table);
		}

		public function getHomeHighlights() {
			$query = $this->db->get_where($this->table, 'key = \'home_highlights\'');
			$row = $query->row();

			return isset($row) ? explode('|', $row->value) : null;
		}

		public function setHomeHighlights($highlights) {
			return $this->db->set('value', $highlights)
							->where('key', 'home_highlights')
							->update($this->table);
		}

		public function getStaticInfos($page) {
			$queryTitle = $this->db->get_where($this->table, 'key = \'static_'.$page.'_title\'');
			$rowTitle = $queryTitle->row();
			$title = isset($rowTitle) ? $rowTitle->value : null;

			$queryText = $this->db->get_where($this->table, 'key = \'static_'.$page.'_text\'');
			$rowText = $queryText->row();
			$text = isset($rowText) ? $rowText->value : null;

			return array('title' => $title, 'text' => $text);
		}
	}
?>