<?php

	class Category {
		public $id;
		public $name;
		public $type;
		public $nbItems;

		public function __construct($id, $name, $type, $nbItems = 0) {
			$this->id = $id;
			$this->name = $name;
			$this->type = $type;
			$this->nbItems = $nbItems;
		}

		public function hasItems() {
			return $this->nbItems > 0;
		}
	}

?>