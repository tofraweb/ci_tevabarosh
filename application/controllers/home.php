<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->model('media_model','',TRUE);
  // }

  public function index()
  {
    $this->load->model('media_model','',TRUE);
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $catalog = $this->media_model->random_catalog_array();
      $data['username'] = $session_data['username'];
      $data['section'] = "books";
      $data['pageTitle'] = 'This the books page';
      $data['catalog'] = $catalog;
      $this->load->view('inc/header');
      $this->load->view('bootstrap/frontpage_view', $data);
      $this->load->view('inc/footer');
    }
    else
    {
      //If no session, redirect to login page
      redirect('login', 'refresh');
	}
  }

  public function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home', 'refresh');
  }


}

?>
