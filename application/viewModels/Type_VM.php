<?php

	class Type_VM {
		public $id;
		public $name;
		public $nbCategories;

		public function __construct() {
			$this->id = 0;
			$this->name = '';
			$this->nbCategories = 0;
		}

		public function hasCategories() {
			return $this->nbCategories > 0;
		}
	}

?>