<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Type.php');

	class TypeService extends CI_Model {

		protected $table = "types";

		private $id;
		private $name;

		private function exists($name) {
			$query = $this->db->where('name', $name)->get($this->table);
			return $query->num_rows() > 0;
		}

		public function addType($name) {
			return !$this->exists($name) && $this->db->set('name', $name)->insert($this->table);
		}

		public function updateType($id, $name) {
			return $this->db->set('name', $name)->where('id', $id)->update($this->table);
		}

		public function getType($id) {
			$query = $this->db->where('id', $id)->get($this->table);
			$row = $query->row();

			if (isset($row)) {
				return new Type(
					$row->id,
					$row->name
				);
			}

			return null;
		}

		// public function getTypes($ids) {
		// 	$result = array();

		// 	foreach ($ids as $id) {
		// 		$type = $id > 0 ? $this->getType($id) : null;
		// 		$result[] = $type;
		// 	}

		// 	return $result;
		// }

		public function getAllTypes() {
			$query = $this->db->get($this->table);
			$result = $query->result();

			$types = array();

			foreach ($result as $row)
			{
				$types[] = new Type(
					$row->id,
					$row->name
				);
			}

			return $types;
		}
	}
?>