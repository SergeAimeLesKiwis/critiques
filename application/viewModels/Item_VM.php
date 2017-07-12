<?php

	class Item_VM {
		public $id;
		public $title;
		public $author;
		public $publish_date;
		public $category;
		public $description;

		public function __construct() {
			$this->id = 0;
			$this->title = '';
			$this->author = '';
			$this->publish_date = date('d/m/Y');
			$this->category = 0;
			$this->description = '';
		}

		public function getImageTag() {
			return '<img src="'.base_url().'assets/img/cover/'.$this->id.'.png" alt="'.$this->title.'" class="img-fluid" />';
		}

		public function getLightInfos() {
			return 'Créé par '.$this->author.' - Sorti le '.$this->publish_date;
		}

		public function getClassification() {
			return $this->category->type->name.' - '.$this->category->name;
		}
	}

?>