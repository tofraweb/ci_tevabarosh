<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Page extends CI_Controller {

  function dynamicPage($page = null, $rand = 4)
  {
    // $this->load->model('catalog_model','',TRUE);
    // $catalog = $this->catalog_model->random_catalog_array($rand, $frontpage);
    if(!$page){
      $page = 'frontpage';
    }
    $data['catalog'] = null;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/'.$page.'_view', $data);
    $this->load->view('inc/footer');
  }

  function staticPage($page = null)
  {
    if(!$page){
      $page = 'frontpage';
    }
    $this->load->view('inc/header');
    $this->load->view('bootstrap/'.$page.'_view');
    $this->load->view('inc/footer');
  }

}

?>
