<?php

	class Page_VM {
		public $id;
		public $name;
		public $label;
		public $title;
		public $text;

		public function __construct() {
			$this->id = 0;
			$this->name = '';
			$this->label = '';
			$this->title = '';
			$this->text = '';
		}

		public function getFullUrl() {
			return base_url().'site/'.$this->name;
		}
	}

?>