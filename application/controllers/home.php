<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->model('catalog_model','',TRUE);
  // }

  public function index()
  {
      $this->load->model('catalog_model','',TRUE);
      $data['bird'] = $this->catalog_model->random_catalog_array(2,1);
      $data['garden'] = $this->catalog_model->random_catalog_array(4,1);
      $data['field'] = $this->catalog_model->random_catalog_array(1,1);
      $data['tree'] = $this->catalog_model->random_catalog_array(5,1);
      $data['best_succulents'] = $this->catalog_model->random_catalog_array(4,3);
      $data['best_birds'] = $this->catalog_model->random_catalog_array(2,4);
      $this->load->view('inc/header');
      $this->load->view('bootstrap/frontpage_view', $data);
      $this->load->view('inc/footer');
  }



}

?>
