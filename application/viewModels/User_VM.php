<?php

	class User_VM {
		public $email;
		public $first_name;
		public $last_name;
		public $description;
		public $interests;
		public $last_login;

		public function __construct($email, $first_name, $last_name, $description, $interests, $last_login) {
			$this->email = $email;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->description = $description;
			$this->interests = explode('|', $interest);
			$this->last_login = $last_login;
		}

		public function getFullName() {
			return $this->first_name.' '.$this->last_name;
		}
	}

?>