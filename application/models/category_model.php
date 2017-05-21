<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCategories(){
		$categories = $this->db->query('SELECT * FROM category');
		return $categories->result();
    }

	public function getItemsList($cCategory){
		$products = $this->db->query("SELECT * FROM items WHERE category_id = $cCategory");
		return $products->result();
    }

	public function getItem($cCategory){
		$products = $this->db->query("SELECT * FROM items WHERE category_id = $cCategory");
		return $products->result();
    }

}
