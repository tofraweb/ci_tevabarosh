<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Page extends CI_Controller {

    function get_name($page = null, $rand = 4)
  {
    $this->load->model('media_model','',TRUE);
    $catalog = $this->media_model->random_catalog_array($rand, null);
    if(!$page){
      $page = 'frontpage';
    }
    $data['catalog'] = $catalog;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/'.$page.'_view', $data);
    $this->load->view('inc/footer');
  }

}

?>
