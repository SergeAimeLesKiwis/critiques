<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Room_VM.php');

	class RoomService extends CI_Model {

		private function exists() {
			return false;
		}

		public $id;
		public $name;
		public $admin;
		public $item;
		public $start_date;
		public $end_date;

		public function addRoom($name, $admin, $item, $start_date, $end_date, $active) {
			return !$this->exists()
				&& $this->db->set('name', $name)
							->set('admin', $admin)
							->set('item', $item)
							->set('start_date', $start_date)
							->set('end_date', $end_date)
							->set('active', $active)
							->insert('rooms');
		}

		public function activateRoom($id) {
			return $this->db->set('active', 1)->where('id', $id)->update('rooms');
		}

		public function getRoom($id) {
			$row = $this->db->where('id', $id)->get('rooms')->row();

			if (isset($row)) {
				$this->load->model('UserService');
				$this->load->model('ItemService');

				$room = new Room_VM();
				$room->id = $row->id;
				$room->name = $row->name;
				$room->admin = $this->UserService->getUser($row->admin);
				$room->item = $this->ItemService->getItem($row->item);
				$room->start_date = date('d/m/Y', strtotime($row->start_date));
				$room->end_date = date('d/m/Y', strtotime($row->end_date));

				return $room;
			}

			return null;
		}

		public function getDatalistRooms() {
			// $this->load->model('CategoryService');

			// $result = $this->db->get('items')->result();
			// $items = array();

			// foreach ($result as $row)
			// {
			// 	$item = new Item_VM();
			// 	$item->id = $row->id;
			// 	$item->title = $row->title;
			// 	$item->category = $this->CategoryService->getCategory($row->category);

			// 	$items[] = $item;
			// }

			// return $items;
		}

		public function getNotOverRoomsOfItem($item) {
			$result = $this->db->where('item', $item)
								->where('active', 1)
								->where('start_date >= ', date('d/m/Y H:i:s'))
								->order_by('start_date')
								->get('rooms')
								->result();
			$rooms = array();

			foreach ($result as $row)
			{
				$room = new Room_VM();
				$room->id = $row->id;
				$room->name = $row->name;
				$room->start_date = date('d/m/Y', strtotime($row->start_date));
				$room->end_date = date('d/m/Y', strtotime($row->end_date));

				$rooms[] = $room;
			}

			return $rooms;
		}

		public function getPendingRooms() {
			$this->load->model('ItemService');
			$this->load->model('UserService');

			$result = $this->db->where('active', 1)->order_by('start_date')->get('rooms')->result();
			$rooms = array();

			foreach ($result as $row)
			{
				$room = new Room_VM();
				$room->id = $row->id;
				$room->name = $row->name;
				$room->admin = $this->UserService->getUser($row->admin);
				$room->item = $this->ItemService->getItem($row->item);
				$room->start_date = date('d/m/Y', strtotime($row->start_date));
				$room->end_date = date('d/m/Y', strtotime($row->end_date));

				$rooms[] = $room;
			}

			return $rooms;
		}
	}
?>