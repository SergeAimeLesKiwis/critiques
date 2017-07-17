<?php
	require_once(dirname(__FILE__).'/Category_VM.php');
	require_once(dirname(__FILE__).'/LoanStatus_VM.php');

	class Item_VM {
		public $id;
		public $title;
		public $author;
		public $publish_date;
		public $category;
		public $image;
		public $description;
		public $loan_status;
		public $grades;

		public function __construct() {
			$this->id = 0;
			$this->title = '';
			$this->author = '';
			$this->publish_date = date('d/m/Y');
			$this->category = new Category_VM();
			$this->image = '';
			$this->description = '';
			$this->loan_status = new LoanStatus_VM();
			$this->grades = 0;
		}

		public function getImageTag() {
			return '<img src="'.$this->image.'" alt="'.$this->title.'" class="img-fluid" />';
		}

		public function getLightInfos() {
			return 'Créé par '.$this->author.' - Sorti le '.$this->publish_date;
		}

		public function getClassification() {
			return $this->category->type->name.' - '.$this->category->name;
		}
	}

?>