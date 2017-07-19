<?php
	require_once(dirname(__FILE__).'/User_VM.php');

	class Room_VM {
		public $id;
		public $name;
		public $admin;
		public $item;
		public $start_date;
		public $end_date;

		public function __construct() {
			$this->id = 0;
			$this->name = '';
			$this->admin = new User_VM();
			$this->item = 0;
			$this->start_date = date('d/m/Y');
			$this->end_date = date('d/m/Y');
		}

		public function getDateRange() {
			return date('d/m/Y', strtotime($this->start_date)).' - '.date('d/m/Y', strtotime($this->end_date));
		}
	}

?>