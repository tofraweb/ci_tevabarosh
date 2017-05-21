<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->library('template'); ///no need since the file is auto uploasded by configuration
	//	$this->template->add_css('css/templatemo_style.css');
		$this->load->model('item_model');
	}

	public function index()
	{
		$this->template->write_view('header', "header_view");
		$this->template->write('title', "Catalogs Page");
		$this->template->write_view('mainmenu', "main_menu_view");
		//$this->template->write_view('sidemenu', "sidemenu_view");
		/*
		$result = $this->db->query('SELECT * FROM category');
		$data['products'] = $result->result();
		*/
		$data['category'] = $this->products_model->getCategories();
		$this->template->write_view('content', "catalogs_view", $data);
		$data = array('copyright'=>'&copy; 2011 - Tomi Frank - Catalogs page');
		$this->template->write_view('footer', "footer_view",$data);
		$this->template->render();
	}

	public function newCategory($err=null){
		$this->load->view('inc/header');
		$error_message['error_message'] = $err;
		$this->load->view('bootstrap/new_category_view', $error_message);
		$this->load->view('inc/footer');
	}

	public function storeCategory(){
		$this->load->model('category_table_model');
		$error = $this->category_table_model->check();
		if(count($error)){
			$this->newCategory($error);
			return;
		}
		$this->category_table_model->storeCategory();
		redirect('home', 'refresh');
	}

/*
	public function category(){
		$this->template->write_view('header', "header_view");
		$this->template->write('title', "Catalogs Page");
		$this->template->write_view('sidemenu', "sidemenu_view");
		$result = $this->db->query('SELECT * FROM category');
		$data['products'] = $result->result();
		$this->template->write_view('content', "catalogs_view", $data);
		$data = array('copyright'=>'&copy; 2011 - Tomi Frank - Catalogs page');
		$this->template->write_view('footer', "footer_view",$data);
		$this->template->render();
	}
	*/

}
