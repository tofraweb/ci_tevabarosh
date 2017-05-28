<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Species_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCategories(){
		$categories = $this->db->query('SELECT * FROM categories');
		return $categories->result();
    }

	public function getSpeciesList($cCategory){
		$species = $this->db->query("SELECT * FROM species WHERE category_id = $cCategory");
		return $species->result();
    }

	public function getSpecies($cCategory){
		$species = $this->db->query("SELECT * FROM species WHERE category_id = $cCategory");
		return $species->result();
    }
}
