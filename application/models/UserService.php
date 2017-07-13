<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once(dirname(__FILE__).'/../viewModels/User_VM.php');

	class UserService extends CI_Model {

		protected $table = "users";

		public $id;
		public $ip_address;
		public $username;
		public $password;
		public $salt;
		public $email;
		public $activation_code;
		public $forgotten_password_code;
		public $forgotten_password_time;
		public $remember_code;
		public $created_on;
		public $last_login;
		public $active;
		public $first_name;
		public $last_name;
		public $company;
		public $phone;
		public $description;
		public $interests;

		public function getUser($id) {
			$user = new User_VM();
			$user->id = $id;
			$user->username = 'Shawn';
			$user->email = 'shawnlecheval@gmail.com';
			$user->first_name = 'Shawn';
			$user->last_name = 'Shawn';
			$user->description = 'Je suis Shawn';
			return $user;
		}
	}
?>