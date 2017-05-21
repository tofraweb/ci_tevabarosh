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

	public function newProduct($err=null){
		$this->template->write_view('header', "header_view");
		$this->template->write('title', "New Product");
		$this->template->write_view('mainmenu', "main_menu_view");
		//$this->template->write_view('sidemenu', "sidemenu_view");
		$category_list = array('category_list'=>$this->products_model->getCategories());
		$error_message['error_message'] = $err;
		$this->template->write_view('content', "new_product_view", $category_list, $error_message);
		$data = array('copyright'=>'&copy; 2011 - Tomi Frank - New Product Page');
		$this->template->write_view('footer', "footer_view",$data);
		$this->template->render();
	}

	public function uploadMessage(){
		$this->template->write_view('header', "header_view");
		$this->template->write('title', "Success Message");
		$this->template->write_view('mainmenu', "main_menu_view");
		//$this->template->write_view('sidemenu', "sidemenu_view");
		$this->template->write_view('content', "upload_success_view");
		$data = array('copyright'=>'&copy; 2011 - Tomi Frank - Success Message Page');
		$this->template->write_view('footer', "footer_view",$data);
		$this->template->render();
	}

	public function doUpload(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success_view', $data);
		}
	}

	public function storeProduct(){
		$this->load->model('products_table_model');
		$error = $this->products_table_model->check();
		if(count($error)){
			$this->newProduct($error);
			return;
		}
		$this->doUpload();
		$this->products_table_model->storeProduct();
		redirect('http://localhost/shop/products/uploadMessage');
	}

}
