<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_user()
  {
    return $this->db->get('ahp_user')->result();
  }

  function get_1_user($i)
  {
    $this->db->where('username',$i);
    return $this->db->get('ahp_user')->result();
  }

  function add()
  {
    $item = [
			'username' => $this->input->post('username'),
			'nama' =>  $this->input->post('nama'),
			'password' => md5($this->input->post('password')),
		];
		$this->db->insert('ahp_user', $item);
  }

  function update($data)
  {
    $data['password']=md5($data['password']);
    $this->db->where('username', $data['username']);
    $this->db->update('ahp_user', $data);
  }

  function delete($i)
  {
    $this->db->where('username',$i);
    $this->db->delete('ahp_user');
  }
}
