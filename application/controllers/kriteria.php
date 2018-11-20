<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kriteria');
    //Codeigniter : Write Less Do More
  }

	public function Index()
	{
    if ($this->session->userdata('isLogin'))
    {
      $data['data']=$this->m_kriteria->get_kriteria1();
  		$this->load->view('kriteria',$data);
    }
    else redirect('login');
	}

  function set()
  {
    if ($this->session->userdata('isLogin'))
    {
      $data['data']=$this->m_kriteria->get_kriteria();
      $this->load->view('kriteria-set',$data);
    }
    else redirect('login');
  }

  function input()
  {
    if ($this->session->userdata('isLogin'))
    {
      $this->m_kriteria->input();
      $this->m_kriteria->normalisasi();
      $this->m_kriteria->pembobotan();
      $this->m_kriteria->konsistensi();
      redirect('kriteria/preferensi');
    }
    else redirect('login');
  }

  function preferensi()
  {
    if ($this->session->userdata('isLogin'))
    {
      $data['data']=$this->m_kriteria->get_preferensi();
      $data['data1']=$this->m_kriteria->get_preferensi_ternormalisasi();
      $data['nama']=$this->m_kriteria->get_kriteria1();
      $this->load->view('kriteria-preferensi',$data);
    }
    else redirect('login');
  }

  function bobot()
  {
    if ($this->session->userdata('isLogin'))
    {
      $data['nama']=$this->m_kriteria->get_kriteria1();
      $data['data']=$this->m_kriteria->get_bobot();
      $data['konsistensi']=$this->m_kriteria->get_konsistensi();
      $this->load->view('kriteria-bobot',$data);
    }
		else redirect('login');
  }
}
