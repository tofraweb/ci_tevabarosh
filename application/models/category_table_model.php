<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_table_model extends CI_Model{

	public $id = null;
	public $name = null;

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
		if($this->name ==""){
			$error['name'] = 'Please fill the category name field!';
		}
		return $error;
	}

	public function storeCategory(){
		$this->db->set($this);
		$this->db->insert('categories');
	}



}
