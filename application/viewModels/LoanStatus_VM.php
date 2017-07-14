<?php

	class LoanStatus_VM  {
		public $name;
		public $color;

		public function __construct() {
			$this->name = '';
			$this->color = '';
		}

		public function getStatusBadge($pull = null) {
			$span = '<span class="badge loan-status';
			if ($pull != null) $span .= ' '.$pull;
			$span .= '" style="background-color:'.$this->color.'">&nbsp;</span>';

			return $span;
		}
	}

?>