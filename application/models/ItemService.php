<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Item.php');

	class ItemService extends CI_Model {

		protected $table = "items";

		private $id;
		private $title;
		private $author;
		private $publish_date;
		private $category;
		private $description;
		private $created_by;
		private $created_at;
		private $updated_by;
		private $updated_at;

		public function getItem($id) {
			$query = $this->db->get_where($this->table, 'id = '.$id);
			$row = $query->row();

			if (isset($row)) {
				$this->load->model('CategoryService');

				return new Item(
					$row->id,
					$row->title,
					$row->author,
					date('d/m/Y',strtotime($row->publish_date)),
					$this->CategoryService->getCategory($row->category),
					$row->description
				);
			}

			return null;
		}

		public function getItems($ids) {
			$result = array();

			foreach ($ids as $id) {
				$item = $id > 0 ? $this->getItem($id) : null;
				$result[] = $item;
			}

			return $result;
		}

		public function getAllItems() {
			$query = $this->db->get($this->table);
			$result = $query->result();

			$items = array();

			$this->load->model('CategoryService');

			foreach ($result as $row)
			{
				$items[] = new Item(
					$row->id,
					$row->title,
					$row->author,
					$row->publish_date,
					$this->CategoryService->getCategory($row->category),
					$row->description
				);
			}

			return $items;
		}
	}
?>