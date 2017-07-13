<?php

	class User_VM {
		public $email;
		public $first_name;
		public $last_name;
		public $username;
		public $description;
		public $loans;

		public function __construct() {
			$this->email = '';
			$this->first_name = '';
			$this->last_name = '';
			$this->username = '';
			$this->description = '';
			$this->loans = array();
		}

		public function getFullName() {
			return $this->first_name.' '.$this->last_name;
		}
	}

?>