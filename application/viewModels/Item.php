<?php

	class Item {
		public $id;
		public $title;
		public $author;
		public $publish_date;
		public $image_path;
		public $category;
		public $description;

		public function __construct($id, $title, $author, $publish_date, $image_path, $category, $description) {
			$this->id = $id;
			$this->title = $title;
			$this->author = $author;
			$this->publish_date = $publish_date;
			$this->image_path = $image_path;
			$this->category = $category;
			$this->description = $description;
		}

		public function getImageTag() {
			return '<img src="'.$this->image_path.'" alt="'.$this->title.'" />';
		}
	}

?>