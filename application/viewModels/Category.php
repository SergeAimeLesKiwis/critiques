<?php

	class Category {
		public $id;
		public $name;
		public $type;

		public function __construct($id, $name, $type) {
			$this->id = $id;
			$this->name = $name;
			$this->type = $type;
		}
	}

?>