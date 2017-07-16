<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Type_VM.php');

	class TypeService extends CI_Model {

		private function exists($name) {
			return $this->db->where('name', $name)->get('types')->num_rows() > 0;
		}

		public function addType($name) {
			return !$this->exists($name) && $this->db->set('name', $name)->insert('types');
		}

		public function updateType($id, $name) {
			return $this->db->set('name', $name)->where('id', $id)->update('types');
		}

		public function deleteType($id) {
			return $this->db->where('id', $id)->delete('types');
		}

		public function getType($id) {
			$row = $this->db->where('id', $id)->get('types')->row();

			if (isset($row)) {
				$type = new Type_VM();
				$type->id = $row->id;
				$type->name = $row->name;

				return $type;
			}

			return null;
		}

		public function getAllTypes() {
			$result = $this->db->get('types')->result();
			$types = array();

			foreach ($result as $row)
			{
				$type = new Type_VM();
				$type->id = $row->id;
				$type->name = $row->name;
				$type->nbCategories = $this->getNbCategories($row->id);

				$types[] = $type;
			}

			return $types;
		}
		
		public function getNbCategories($type) {
			return $this->db->where('type', $type)->get('categories')->num_rows();
		}
	}
?>