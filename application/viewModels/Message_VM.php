<?php
	require_once(dirname(__FILE__).'/User_VM.php');

	class Message_VM {
		public $user;
		public $date;
		public $content;

		public function __construct() {
			$this->user = new User_VM();
			$this->date = date('d/m/Y');
			$this->content = '';
		}

		public function getDateFormated() {
			return date('d/m/Y', strtotime($this->date));
		}

		public function getHourFormated() {
			return date('H:i', strtotime($this->date));	
		}
	}

?>