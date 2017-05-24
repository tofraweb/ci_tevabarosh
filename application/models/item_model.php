<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCategories(){
		$categories = $this->db->query('SELECT * FROM categories');
		return $categories->result();
    }

	public function getItemList($cCategory){
		$items = $this->db->query("SELECT * FROM items WHERE category_id = $cCategory");
		return $items->result();
    }

	public function getItem($cCategory){
		$item = $this->db->query("SELECT * FROM items WHERE category_id = $cCategory");
		return $item->result();
    }
}
