<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Category.php');

	class CategoryService extends CI_Model {

		protected $table = "categories";

		private $id;
		private $name;
		private $type;

		public function getCategory($id) {
			$query = $this->db->get_where($this->table, 'id = '.$id);
			$row = $query->row();

			if (isset($row)) {
				$this->load->model('TypeService');

				return new Category(
					$row->id,
					$row->name,
					$this->TypeService->getType($row->type)
				);
			}

			return null;
		}

		// public function getCategories($ids) {
		// 	$result = array();

		// 	foreach ($ids as $id) {
		// 		$type = $id > 0 ? $this->getType($id) : null;
		// 		$result[] = $type;
		// 	}

		// 	return $result;
		// }

		public function getAllCategories() {
			$query = $this->db->get($this->table);
			$result = $query->result();

			$types = array();

			$this->load->model('TypeService');

			foreach ($result as $row)
			{
				$types[] = new Category(
					$row->id,
					$row->name,
					$this->TypeService->getType($row->type)
				);
			}

			return $types;
		}
	}
?>