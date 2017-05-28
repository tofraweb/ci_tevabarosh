<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Species extends CI_Controller {

	public function __construct(){

		parent::__construct();

			$this->load->model('species_model');
		//	$this->load->library('grocery_CRUD');

	}

	public function index(){
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    $this->load->view('inc/header');
    $this->load->view('bootstrap/frontpage_view');
		$this->load->view('inc/footer');

	}

	// public function _example_output($output = null)
	// {
	// 	$this->load->view('example.php',(array)$output);
	// }
	//
	// public function editSpecies()
	// {
	//
	// 	try{
	// 		$crud = new grocery_CRUD();
	//
	// 		$crud->set_theme('datatables');
	// 		$crud->set_table('species');
	// 		$crud->set_subject('Species');
	// 		$crud->required_fields('title');
	// 		$crud->columns('title','title_lat','title_hun','category_id','description','picture','featuring','frontpage');
	// 		$output = $crud->render();
	//
	// 		//$this->_example_output($output);
	//
	// 	//	$this->load->view('inc/header');
	// 		$this->load->view('example', $output);
	//     $this->load->view('inc/footer');
	//
	// 		// var_dump('haha');
	// 		// exit;
	// 	}catch(Exception $e){
	// 		show_error($e->getMessage().' --- '.$e->getTraceAsString());
	// 	}
	// }

	public function getSpecies($category){

    $this->load->view('inc/header');
		$data['speciess'] = $this->species_model->getSpeciesList($category);
		$data['category'] = $category;
		$this->load->view('bootstrap/Species_view', $data, $category);
    $this->load->view('inc/footer');

	}

	public function newSpecies($err=null){

    $this->load->view('inc/header');
		$category_list = array('category_list'=>$this->species_model->getCategories());
		$error_message['error_message'] = $err;
		$this->load->view('bootstrap/new_species_view', $category_list, $error_message);
    $this->load->view('inc/footer');

	}


	public function uploadMessage($message){

    $this->load->view('inc/header');
		$this->load->view('bootstrap/upload_success_view', $message );
    $this->load->view('inc/footer');

	}


  public function resizeImage($picture_name){

    $config['source_image'] = 'assets/img/media/upload/'.$picture_name;
    $config['maintain_ratio'] = FALSE;
    $config['width']         = 1400;
    $config['height']       = 932;
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

  }


	public function doUpload(){

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
		} else {
			$data = array('upload_data' => $this->upload->data());
      $picture_name = $data['upload_data']['file_name'];
      $this->resizeImage($picture_name);
      $this->species_table_model->storeSpecies($picture_name);
      $this->uploadMessage($data);
		}

	}

	public function checkSpecies(){
		$this->load->model('species_table_model');
		$error = $this->species_table_model->check();
		if(count($error)){
			$this->newSpecies($error);
			return;
		}
		$this->doUpload();
	}

}
