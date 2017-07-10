<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Type.php');

	class TypeService extends CI_Model {

		protected $table = "types";

		private $id;
		private $name;

		public function getType($id) {
			$query = $this->db->get_where($this->table, 'id = '.$id);
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