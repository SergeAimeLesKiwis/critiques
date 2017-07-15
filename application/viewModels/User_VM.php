<?php

	class User_VM {
		public $email;
		public $first_name;
		public $last_name;
		public $username;
		public $description;
		public $loans;
		public $reports;
		public $status;

		public function __construct() {
			$this->email = '';
			$this->first_name = '';
			$this->last_name = '';
			$this->username = '';
			$this->description = '';
			$this->loans = array();
			$this->reports = array();
			$this->status = '';
		}

		public function getFullName() {
			return $this->first_name.' '.$this->last_name;
		}

		public function getAction() {
			if ($this->status == 'admin')
				return '<span class="badge bg-darkgrey-color">ADMIN</span>';

			if ($this->status == 'member')
				return '<button class="btn btn-sm report-warn user-action" data-action="warn" data-key="'.$this->id.'"><i class="fa fa-warning"></i></button>';

			if ($this->status == 'warned')
				return '<button class="btn btn-sm report-ban user-action" data-action="ban" data-key="'.$this->id.'"><i class="fa fa-ban"></i></button>';

			if ($this->status == 'banned')
				return '<span class="badge report-ban">BANNI</span>';
		}
	}

?>