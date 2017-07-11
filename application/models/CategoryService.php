<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Category.php');

	class CategoryService extends CI_Model {

		private function exists($name, $type) {
			return $this->db->where('name', $name)->where('type', $type)->get('categories')->num_rows() > 0;
		}

		public function addCategory($name, $type) {
			return !$this->exists($name, $type) && $this->db->set('name', $name)->set('type', $type)->insert('categories');
		}

		public function updateCategory($id, $name, $type) {
			return $this->db->set('name', $name)->set('type', $type)->where('id', $id)->update('categories');
		}

		public function deleteCategory($id) {
			return $this->db->where('id', $id)->delete('categories');
		}

		public function getCategory($id) {
			$row = $this->db->where('id', $id)->get('categories')->row();

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

		public function getAllCategories() {
			$this->load->model('TypeService');

			$result = $this->db->get('categories')->result();
			$types = array();

			foreach ($result as $row)
			{
				$types[] = new Category(
					$row->id,
					$row->name,
					$this->TypeService->getType($row->type),
					$this->getNbItems($row->id)
				);
			}

			return $types;
		}

		public function getNbItems($category) {
			return $this->db->where('category', $category)->get('items')->num_rows();
		}
	}
?>