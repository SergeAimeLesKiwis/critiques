<?php

	class Item {
		public $id;
		public $title;
		public $author;
		public $publish_date;
		public $category;
		public $description;

		public function __construct($id, $title, $author, $publish_date, $category, $description) {
			$this->id = $id;
			$this->title = $title;
			$this->author = $author;
			$this->publish_date = $publish_date;
			$this->category = $category;
			$this->description = $description;
		}

		public function getImageTag() {
			return '<img src="'.base_url().'assets/img/cover/'.$this->id.'.png" alt="'.$this->title.'" class="img-fluid" />';
		}

		public function getLightInfos() {
			return '<em>Créé par '.$this->author.' - Sorti le '.$this->publish_date.'</em>';
		}
	}

?>