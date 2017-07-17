<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Category_VM.php');

	class CategoryService extends CI_Model {

		private function exists($id, $name, $type) {
			return $this->db->where('id !=', $id)->where('name', $name)->where('type', $type)->get('categories')->num_rows() > 0;
		}

		public function addCategory($name, $type) {
			return !$this->exists(0, $name, $type) && $this->db->set('name', $name)->set('type', $type)->insert('categories');
		}

		public function updateCategory($id, $name, $type) {
			return !$this->exists($id, $name, $type) && $this->db->set('name', $name)->set('type', $type)->where('id', $id)->update('categories');
		}

		public function deleteCategory($id) {
			return $this->db->where('id', $id)->delete('categories');
		}

		public function getCategory($id) {
			$row = $this->db->where('id', $id)->get('categories')->row();

			if (isset($row)) {
				$this->load->model('TypeService');

				$category = new Category_VM();
				$category->id = $row->id;
				$category->name = $row->name;
				$category->type = $this->TypeService->getType($row->type);

				return $category;
			}

			return null;
		}

		public function getAllCategories() {
			$this->load->model('TypeService');

			$result = $this->db->get('categories')->result();
			$types = array();

			foreach ($result as $row)
			{
				$category = new Category_VM();
				$category->id = $row->id;
				$category->name = $row->name;
				$category->type = $this->TypeService->getType($row->type);
				$category->nbItems = $this->getNbItems($row->id);

				$types[] = $category;
			}

			return $types;
		}

		public function getNbItems($category) {
			return $this->db->where('category', $category)->get('items')->num_rows();
		}
	}
?>