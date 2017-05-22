<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->library('template'); ///no need since the file is auto uploasded by configuration
		//$this->template->add_css('css/templatemo_style.css');
		$this->load->model('item_model');
		//$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
    $this->load->view('inc/header');
    $this->load->view('bootstrap/frontpage_view');
		$this->load->view('inc/footer');
	}

	public function getItem($category){
    $this->load->view('inc/header');
		$data['items'] = $this->item_model->getItemList($category);
		$data['category'] = $category;
		$this->load->view('bootstrap/items_view', $data, $category);
    $this->load->view('inc/footer');
	}

	public function newItem($err=null){
    $this->load->view('inc/header');
		$category_list = array('category_list'=>$this->item_model->getCategories());
		$error_message['error_message'] = $err;
		$this->load->view('bootstrap/new_item_view', $category_list, $error_message);
    $this->load->view('inc/footer');
	}

	public function uploadMessage($message){
    $this->load->view('inc/header');
		$this->load->view('bootstrap/upload_success_view', $message );
    $this->load->view('inc/footer');
	}

	public function doUpload(){
    /*var_dump("new item");
    exit;*/
		$config['upload_path'] = 'assets/img/media/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '9000';
		$config['max_width']  = '5024';
		$config['max_height']  = '3768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
      $this->item_table_model->storeItem($data['upload_data']['file_name']);
      $this->uploadMessage($data);
			//$this->load->view('bootstrap/upload_success_view', $data);
		}

	}

	public function checkItem(){
		$this->load->model('item_table_model');
		$error = $this->item_table_model->check();
		if(count($error)){
			$this->newItem($error);
			return;
		}
		$this->doUpload();
	}

}
