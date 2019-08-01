<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alternatif extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function add()
  {
    $item = [
			'nama' => $this->input->post('nama'),
			'atap' =>  $this->input->post('atap'),
			'lantai' => $this->input->post('lantai'),
			'dinding' => $this->input->post('dinding'),
			'penerangan' => $this->input->post('penerangan'),
			'air' => $this->input->post('air')
		];
		$this->db->insert('ahp_data_alternatif', $item);
  }

  function update($data)
  {
    $this->db->where('id_alternatif', $data['id_alternatif']);
    $this->db->update('ahp_data_alternatif', $data);
  }

  function delete($i)
  {
    $this->db->where('id_alternatif',$i);
    $this->db->delete('ahp_data_alternatif');
  }

  function normalisasi()
  {
    $tabel = $this->db->get('ahp_data_alternatif')->result();
    $hasil[1]=0; $hasil[2]=0; $hasil[3]=0; $hasil[4]=0; $hasil[5]=0;
    foreach ($tabel as $key => $row) {
      $hasil[1]+=$row->atap;
      $hasil[2]+=$row->lantai;
      $hasil[3]+=$row->dinding;
      $hasil[4]+=$row->penerangan;
      $hasil[5]+=$row->air;
    }

    $data=array();
    foreach ($tabel as $key => $row) {
      $item = [
        'id_alternatif' => $row->id_alternatif,
        'nama' => $row->nama,
        'atap' => $row->atap/$hasil[1],
        'lantai' => $row->lantai/$hasil[2],
        'dinding' => $row->dinding/$hasil[3],
        'penerangan' => $row->penerangan/$hasil[4],
        'air' => $row->air/$hasil[5]
      ];
      array_push($data, $item);
    }
    $this->db->empty_table('ahp_data_alternatif_ternormalisasi');
    $this->db->insert_batch('ahp_data_alternatif_ternormalisasi', $data);
    return $this->db->get('ahp_data_alternatif_ternormalisasi')->result();
  }

  function get_alternatif()
  {
    return $this->db->get('ahp_data_alternatif')->result();
  }

  function get_1_alternatif($i)
  {
    $this->db->where('id_alternatif',$i);
    return $this->db->get('ahp_data_alternatif')->result();
  }
}
