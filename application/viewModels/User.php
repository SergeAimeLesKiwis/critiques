<?php

	class User {
		public $email;
		public $firstName;
		public $lastName;
		public $description;
		public $interests;
		public $lastConnexion;

		public function __construct($email, $firstName, $lastName, $description, $interests, $lastConnexion) {
			$this->email = $email;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->description = $description;
			$this->interests = explode('|', $interest);
			$this->lastConnexion = $lastConnexion;
		}

		public function getFullName() {
			return $this->firstName.' '.$this->lastName;
		}
	}

?>