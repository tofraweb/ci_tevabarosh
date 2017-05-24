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


  public function makeThumbnail($picture_name){
    $config['image_library'] = 'gd2';
    $config['source_image'] = 'assets/img/media/upload/'.$picture_name;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 390;
    $config['height']       = 260;
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    //updating picture name
    $before_dot =  stristr($picture_name,'.',TRUE);
    $after_dot =  stristr($picture_name,'.',FALSE);
    $thumb_name =  $before_dot."_thumb".$after_dot;
    return $thumb_name;
  }


	public function doUpload(){
    /*var_dump("new item");
    exit;*/
		$config['upload_path'] = 'assets/img/media/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '90000';
		$config['max_width']  = '9024';
		$config['max_height']  = '6768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('bootstrap/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
      $picture_name = $data['upload_data']['file_name'];
      //var_dump($picture_name);
      //exit;
      $thumbnail_name = $this->makeThumbnail($picture_name);
      $this->item_table_model->storeItem($thumbnail_name);
      $this->uploadMessage($data);
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
