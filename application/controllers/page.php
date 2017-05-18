<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Page extends CI_Controller {

    function get_name($page = null)
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
