<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Species_table_model extends CI_Model{

	public $id = null;
	public $name_he = null;
	public $name_lat = null;
	public $name_hu = null;
	public $category_id = null;
	public $description = null;
	public $picture = 'null';
	public $featuring = 0;
	public $frontpage = 0;

	public function __construct()
	{
		parent::__construct();
		$input = load_class('Input', 'core');
		$variables = get_class_vars(__CLASS__);
		foreach($variables as $variable=>$value){
			$this->$variable = $input->post($variable);
		}
	}

	public function check(){
		$error = array();
		if($this->name_he==""){
			$error['name_he'] = 'Please fill the title!';
		}
		if($this->category_id==""){
			$error['category_id'] = 'Please fill the genre!';
		}
		if($this->description ==""){
			$error['description'] = 'Please fill the description!';
		}
		return $error;
	}

	public function storeSpecies($pic_name){
    $this->picture = $pic_name;
		$this->db->set($this);
		$this->db->insert('species');
	}



}
