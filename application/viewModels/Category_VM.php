<?php

	class Category_VM {
		public $id;
		public $name;
		public $type;
		public $nbItems;

		public function __construct() {
			$this->id = 0;
			$this->name = '';
			$this->type = new Type_VM();
			$this->nbItems = 0;
		}

		public function hasItems() {
			return $this->nbItems > 0;
		}
	}

?>