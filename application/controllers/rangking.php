<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_rangking');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if ($this->session->userdata('isLogin'))
    {
      $data['data'] = $this->M_rangking->hit_nilai();
      $this->load->view('rangking',$data);
    }
    else redirect('login');
  }
}
