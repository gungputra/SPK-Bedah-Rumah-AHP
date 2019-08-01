<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_alternatif');
		//Codeigniter : Write Less Do More
	}

	public function Index()
	{
		if ($this->session->userdata('isLogin'))
		{
			$data['data']=$this->M_alternatif->get_alternatif();
			$this->load->view('alternatif',$data);
		}
		else redirect('login');
	}

	public function tambah()
	{
		if ($this->session->userdata('isLogin'))
		{
			$this->load->view('alternatif-baru');
		}
		else redirect('login');
	}

	function input()
	{
		$this->M_alternatif->add();
		redirect('alternatif/');
	}

	function hapus($i)
	{
		$this->M_alternatif->delete($i);

	}

	function update()
	{
		$data=$this->input->post();
		$this->M_alternatif->update($data);
		redirect('alternatif/');
	}

	function edit($i)
	{
		if ($this->session->userdata('isLogin'))
		{
			$data['data'] = $this->M_alternatif->get_1_alternatif($i);
			$this->load->view('alternatif-edit',$data);
		}
		else redirect('login');
	}

	function normalisasi()
	{
		if ($this->session->userdata('isLogin'))
		{
			$data['data'] = $this->M_alternatif->normalisasi();
			$this->load->view('alternatif-normalisasi',$data);
		}
		else redirect('login');
	}
}
