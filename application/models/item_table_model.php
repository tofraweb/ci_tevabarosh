<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_table_model extends CI_Model{

	public $id = null;
	public $title = null;
	public $category_id = null;
	public $description = null;
	public $picture = 'null';

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
		if($this->title==""){
			$error['title'] = 'Please fill the title!';
		}
		if($this->category_id==""){
			$error['category_id'] = 'Please fill the genre!';
		}
		if($this->description ==""){
			$error['description'] = 'Please fill the description!';
		}
		return $error;
	}

	public function storeItem($pic_name){
    $this->picture = $pic_name;
		$this->db->set($this);
		$this->db->insert('items');
	}



}
