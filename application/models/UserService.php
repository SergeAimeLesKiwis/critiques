<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/User.php');

	class UserService extends CI_Model {

		protected $table = "users";

		public $email;
		public $password;
		public $firstName;
		public $lastName;
		public $description;
		public $interests;
		public $subscriptionDate;
		public $lastConnexion;
		public $status;

		public function login($email, $password) {
			$row = $this->db->select('*')
					->from($this->table)
					->where('status IN (1, 3, 4)')
					->where('email', $email)
					->where('password', md5($password))
					->row();

			if (isset($row)) {
				$user = new User(
					$row->email,
					$row->firstName,
					$row->lastName,
					$row->description,
					$row->interests,
					$row->lastConnexion
				);

				return $user;
			}

			return null;
		}
	}
?>