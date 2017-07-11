<?php

	class Type {
		public $id;
		public $name;
		public $nbCategories;

		public function __construct($id, $name, $nbCategories = 0) {
			$this->id = $id;
			$this->name = $name;
			$this->nbCategories = $nbCategories;
		}

		public function hasCategories() {
			return $this->nbCategories > 0;
		}
	}

?>