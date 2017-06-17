<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');

	}

	public function index()
	{
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		} else {
			$data['section'] = null;
			$this->load->view('login_view');
			$this->load->view('inc/footer');
		}

	}

	public function _example_output($output = null, $title = 'ניהול')
	{
		$_SESSION['title'] = $title;
		$this->load->view('admin_view.php',(array)$output);
	}

	public function species()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function orders()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output, 'סדרה');
	}

	public function pictures_management($id = null)
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('pictures');
			if($id){
				$crud->where('species_id', $id);
			}
			$crud->set_subject('Pictures');
			$crud->required_fields('filename', 'species_id');
			$crud->set_subject('pictures');
			$crud->set_relation('species_id','species','name_he');
			$crud->set_relation('img_type_id','img_type','name');
			$crud->set_field_upload('filename','assets/img/media/upload');

			$crud->callback_after_upload(array($this,'resize_img_after_upload'));

			$output = $crud->render();

			$this->_example_output($output, 'תמונות');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function audio_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('audio');
			$crud->set_subject('Audio');
			$crud->required_fields('species_id');
			//$crud->set_subject('pictures');
			$crud->set_relation('species_id','species','name_he');
			$crud->set_field_upload('filename_song','assets/uploads/audio/song');
			$crud->set_relation('species_id','species','name_he');
			$crud->set_field_upload('filename_call','assets/uploads/audio/call');
			$crud->set_relation('species_id','species','name_he');
			$crud->set_field_upload('filename_alarm','assets/uploads/audio/alarm');

			//$crud->callback_after_upload(array($this,'resize_img_after_upload'));

			$output = $crud->render();

			$this->_example_output($output, 'אודיו');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function video_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('video');
			$crud->set_subject('Video');
			$crud->required_fields('filename', 'species_id');
			//$crud->set_subject('pictures');
			$crud->set_relation('species_id','species','name_he');

			$output = $crud->render();

			$this->_example_output($output, 'סרטון');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function family_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('family');
			$crud->set_subject('Family');
			$crud->required_fields('name_he');
			$crud->columns('name_he','name_lat','order_id');
			$crud->set_subject('family');
			$crud->set_relation('order_id','orders','name_he');

			$output = $crud->render();

			$this->_example_output($output, 'משפחה');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function genus_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('genus');
			$crud->set_subject('Genus');
			$crud->required_fields('name_he');
			$crud->columns('name_he','name_lat','family_id');
			$crud->set_subject('genus');
			$crud->set_relation('family_id','family','name_he');

			$output = $crud->render();

			$this->_example_output($output, 'סוג');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function species_management()
	{
		try{
			$crud = new grocery_CRUD();
			$id = $_GET['id'];
			// var_dump($id);
			// exit;
			$crud->set_theme('datatables');
			$crud->set_table('species');
			$crud->set_subject('Species');
			$crud->required_fields('name_he', 'category_id');
			$crud->columns('name_he','name_lat','name_hun', 'genus_id', 'category_id', 'picture', 'featuring','frontpage');
      $crud->set_field_upload('picture','assets/img/media/upload');
			$crud->set_subject('species');
			$crud->set_relation('category_id','categories','name');
			$crud->set_relation('genus_id','genus','name_he');
			//$crud->set_relation('picture','pictures','filename',array('species_id' => $id, 'img_type_id' => '1' ));
			//$crud->set_relation('user_id','users','username',array('status' => 'active'));
			// $crud->set_relation_n_n('image', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->add_action('Images', 'http://www.grocerycrud.com/assets/uploads/general/smiley.png', 'admin/pictures_management');
			//$crud->where('pictures.species_id','41');
			//$crud->callback_after_upload(array($this,'resize_img_after_upload'));

			$output = $crud->render();

			$this->_example_output($output, 'מינים');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function plant_properties_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('plant_properties');
			$crud->set_subject('Plant Properties');
			$crud->columns('species_id','light_conditions','watering', 'blooming_season');
			$crud->required_fields('species_id');
			$crud->set_relation('species_id','species','name_he');
			$crud->field_type('watering','multiselect', array(
                    			"מועטה"  => "מועטה",
									  			"בינונית" => "בינונית",
													"מרובה"  => "מרובה",
													"הרבה מאוד" => "הרבה מאוד",
													"רגיש ליובש"  => "רגיש ליובש",
													"רגיש לעודף השקיה" => "רגיש לעודף השקיה"
												));

			$crud->field_type('light_conditions','multiselect', array(
													"צל מלא"  => "צל מלא",
													"צל חלקי"  => "צל חלקי",
													"שמש חלקית"  => "שמש חלקית",
													"שמש מלאה"  => "שמש מלאה"
												));

			$crud->field_type('growing_speed','multiselect', array(
													"איטי"  => "איטי",
													"בינוני"  => "בינוני",
													"מהיר"  => "מהיר"
												));

			$crud->field_type('blooming_season','multiselect', array(
													"אביב"  => "אביב",
													"קיץ"  => "קיץ",
													"סתיו"  => "סתיו",
													"חורף"  => "חורף",
													"כל השנה"  => "כל השנה",
												));

			$crud->field_type('flower_color','multiselect', array(
													"כחול"  => "כחול",
													"סגול"  => "סגול",
													"אדום"  => "אדום",
													"כתום"  => "כתום",
													"וורוד"  => "וורוד",
													"לבן"  => "לבן",
													"צהוב"  => "צהוב"
												));

			$crud->field_type('life_span','multiselect', array(
													"רב שנתי"  => "רב שנתי",
													"קצר חיים"  => "קצר חיים",
													"עונתי"  => "עונתי"
												));

			//  $crud->field_type('fruits','multiselect', array(
			// 	"banana"  => "banana",
			//  	"banana" => "apple"));

			$output = $crud->render();

			$this->_example_output($output, 'אפיון צמחים');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function resize_img_after_upload($uploader_response,$field_info, $files_to_upload) {
		$this->load->library('image_moo');

		//Is only one file uploaded so it ok to use it with $uploader_response[0].
		$file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;

		$this->image_moo->load($file_uploaded)->resize(1400,932)->save($file_uploaded,true);

		return true;
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

 /*DB related scripts*/
	public function update_species_pictures()
	{
		$this->load->model('gallery_model','',TRUE);
		$premium_pictures = $this->gallery_model->get_premium_pictures();
		// var_dump($premium_pictures);
		// exit;
		foreach($premium_pictures as $picture){
			// var_dump($picture->species_id);
			// exit;
			$this->gallery_model->insert_premium_pictures($picture->species_id,$picture->filename);
		}
		redirect('admin', 'refresh');
	}

}
