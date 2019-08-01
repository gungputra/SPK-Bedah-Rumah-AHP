<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
    //Codeigniter : Write Less Do More
  }

  public function Index()
	{
		if ($this->session->userdata('isLogin'))
		{
			$data['data']=$this->M_user->get_user();
			$this->load->view('user',$data);
		}
		else redirect('login');
	}

  public function tambah()
	{
		if ($this->session->userdata('isLogin'))
		{
			$this->load->view('user-baru');
		}
		else redirect('login');
	}

  function input()
	{
		$this->M_user->add();
		redirect('user/');
	}

  function hapus($i)
  {
    $this->M_user->delete($i);
    redirect('user/');
  }

  function update()
  {
    $data=$this->input->post();
    $this->M_user->update($data);
    redirect('user/');
  }

  function edit($i)
  {
    if ($this->session->userdata('isLogin'))
    {
      $data['data'] = $this->M_user->get_1_user($i);
      $this->load->view('user-edit',$data);
    }
    else redirect('login');
  }

}
