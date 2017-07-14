<?php
	require_once(dirname(__FILE__).'/User_VM.php');

	class Report_VM {
		public $id;
		public $reason;
		public $value;
		public $reported_by;
		public $reported_at;

		public function __construct() {
			$this->id = 0;
			$this->reason = '';
			$this->value = 0;
			$this->reported_by = new User_VM();
			$this->reported_at = date('d/m/Y');
		}
	}

?>