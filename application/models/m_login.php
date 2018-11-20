<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function login($user, $pass)
	{
		$this->db->where('username', $user);
		$result = $this->db->get('ahp_user')->row_array();
		if (($result['username'] == $user) and ($result['password'] == $pass  )) {
			return $result;
		} else return null;
	}
}
