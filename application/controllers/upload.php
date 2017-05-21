<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Upload extends CI_Controller {

  public function index()
  {
      $data['section'] = null;
      $this->load->view('inc/header',$data);
      $this->load->view('bootstrap/upload_form', array('error' => ' ' ));
      $this->load->view('inc/footer');
  }

  public function do_upload()
  {
        $config['upload_path']          = 'assets/img/media/upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 400;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $data['error'] = $this->upload->display_errors();
                $data['section'] = null;
                $this->load->view('inc/header',$data);
                $this->load->view('bootstrap/upload_form', $data);
                $this->load->view('inc/footer');
        }
        else
        {
                //$data = array('upload_data' => $this->upload->data());
                $data['upload_data'] = $this->upload->data();
                $this->load->view('inc/header');
                $this->load->view('bootstrap/upload_success', $data);
                $this->load->view('inc/footer');
        }
  }

}

?>
