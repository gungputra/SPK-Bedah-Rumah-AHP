<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_login');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if ($this->session->userdata('isLogin')) {redirect(alternatif);}
		else $this->load->view('login');
  }

  function login()
  {
    $user=$this->input->post('username');
		$pass=md5($this->input->post('password'));
		$data=$this->M_login->login($user,$pass);
		if (is_null($data)) {
			$data['isLogin']=false;
      redirect('login');
		}else{
			$data['isLogin']=true;
			$this->session->set_userdata($data);
      redirect('alternatif');
		}
  }
  function logout()
  {
    $this->session->unset_userdata('isLogin');
		$this->session->sess_destroy();
		redirect('login');
  }
}
