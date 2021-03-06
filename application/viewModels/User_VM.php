<?php

	class User_VM {
		public $id;
		public $email;
		public $first_name;
		public $last_name;
		public $username;
		public $description;
		public $loans;
		public $reports;
		public $status;

		public function __construct() {
			$this->id = 0;
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

		public function getImageTag() {
			return '<img src="'.base_url().'assets/img/user/'.$this->id.'.png" alt="'.$this->getFullName().'" class="img-fluid" />';
		}

		public function getProfileTag() {
			return '<a class="brown-hover" href="'.base_url().'user/profile/'.$this->id.'">'.$this->getFullName().'</a>';
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