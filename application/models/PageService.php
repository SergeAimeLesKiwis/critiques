<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	require_once(dirname(__FILE__).'/../viewModels/Page_VM.php');

	class PageService extends CI_Model {

		private function exists($id, $name) {
			return $this->db->where('id !=', $id)->where('name', $name)->get('pages')->num_rows() > 0;
		}

		public function addPage($name, $label, $title, $text) {
			return !$this->exists(0, $name)
				&& $this->db->set('name', $name)
							->set('label', $label)
							->set('title', $title)
							->set('text', $text)
							->insert('pages');
		}

		public function updatePage($id, $name, $label, $title, $text) {
			return !$this->exists($id, $name)
				&& $this->db->set('name', $name)
							->set('label', $label)
							->set('title', $title)
							->set('text', $text)
							->where('id', $id)
							->update('pages');
		}

		public function deletePage($id) {
			return $this->db->where('id', $id)->delete('pages');
		}

		public function getPageByName($name) {
			$row = $this->db->where('name', $name)->get('pages')->row();

			if (isset($row)) {
				$page = new Page_VM();
				$page->id = $row->id;
				$page->name = $row->name;
				$page->label = $row->label;
				$page->title = $row->title;
				$page->text = $row->text;

				return $page;
			}

			return null;
		}

		public function getPage($id) {
			$row = $this->db->where('id', $id)->get('pages')->row();

			if (isset($row)) {
				$page = new Page_VM();
				$page->id = $row->id;
				$page->name = $row->name;
				$page->label = $row->label;
				$page->title = $row->title;
				$page->text = $row->text;

				return $page;
			}

			return null;
		}

		public function getAllPages() {
			$result = $this->db->get('pages')->result();
			$pages = array();

			foreach ($result as $row)
			{
				$page = new Page_VM();
				$page->id = $row->id;
				$page->name = $row->name;
				$page->label = $row->label;
				$page->title = $row->title;
				$page->text = $row->text;

				$pages[] = $page;
			}

			return $pages;
		}
	}
?>