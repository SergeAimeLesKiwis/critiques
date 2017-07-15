<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/Item_VM.php');

	class ItemService extends CI_Model {

		private function exists($title, $category) {
			return $this->db->where('title', $title)->where('category', $category)->get('items')->num_rows() > 0;
		}

		public function addItem($title, $author, $publish_date, $category, $description) {
			return !$this->exists($title, $category)
				&& $this->db->set('title', $title)
							->set('author', $author)
							->set('publish_date', $publish_date)
							->set('category', $category)
							->set('description', $description)
							->set('created_by', $_SESSION['user_id'])
							->set('created_at', date("Y-m-d H:i:s"))
							->insert('items');
		}

		public function updateItem($id, $title, $author, $publish_date, $category, $description) {
			return $this->db->set('title', $title)
							->set('author', $author)
							->set('publish_date', $publish_date)
							->set('category', $category)
							->set('description', $description)
							->set('updated_by', $_SESSION['user_id'])
							->set('updated_at', date("Y-m-d H:i:s"))
							->where('id', $id)
							->update('items');
		}

		public function getItem($id) {
			$row = $this->db->where('id', $id)->get('items')->row();

			if (isset($row)) {
				$this->load->model('CategoryService');

				$item = new Item_VM();
				$item->id = $row->id;
				$item->title = $row->title;
				$item->author = $row->author;
				$item->publish_date = date('d/m/Y', strtotime($row->publish_date));
				$item->category = $this->CategoryService->getCategory($row->category);
				$item->description = $row->description;

				return $item;
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

		public function getDatalistItems() {
			$this->load->model('CategoryService');

			$result = $this->db->get('items')->result();
			$items = array();

			foreach ($result as $row)
			{
				$item = new Item_VM();
				$item->id = $row->id;
				$item->title = $row->title;
				$item->category = $this->CategoryService->getCategory($row->category);

				$items[] = $item;
			}

			return $items;
		}

		public function getDatalistLoans($user) {
			$this->load->model('CategoryService');

			$result = $this->db->select('i.id, i.title, i.category')
								->from('items i')
								->join('loans l', 'l.item = i.id', 'inner')
								->where('l.user', $user)
								->where('l.status', 1)
								->get()
								->result();
			$items = array();

			foreach ($result as $row)
			{
				$item = new Item_VM();
				$item->id = $row->id;
				$item->title = $row->title;
				$item->category = $this->CategoryService->getCategory($row->category);

				$items[] = $item;
			}

			return $items;
		}

		public function getSuggestions($id, $category) {
			$result = $this->db->where('id !=', $id)->where('category', $category)->order_by('RAND()')->limit(3)->get('items')->result();
			$items = array();

			foreach ($result as $row)
			{
				$item = new Item_VM();
				$item->id = $row->id;
				$item->title = $row->title;

				$items[] = $item;
			}

			return $items;
		}

		public function getFilteredItems($title, $author, $type, $category) {
			$this->load->model('CategoryService');

			$result = $this->db->select('i.id, i.title, i.author, i.publish_date, c.id AS itemCategory')
								->from('items i')
								->join('categories c', 'c.id = i.category', 'inner');

			if (!empty($title)) $result = $result->like('i.title', $title);
			if (!empty($author)) $result = $result->like('i.author', $author);
			if (!empty($type)) $result = $result->where('c.type', $type);
			if (!empty($category)) $result = $result->where('i.category', $category);

			$result = $result->get()->result();
			$items = array();

			foreach ($result as $row)
			{
				$item = new Item_VM();
				$item->id = $row->id;
				$item->title = $row->title;
				$item->author = $row->author;
				$item->publish_date = date('d/m/Y', strtotime($row->publish_date));
				$item->category = $this->CategoryService->getCategory($row->itemCategory);

				$items[] = $item;
			}

			return $items;
		}
	}
?>