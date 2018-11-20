<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_rangking extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function hit_nilai()
  {
    $tabel = $this->db->get('ahp_data_alternatif_ternormalisasi')->result();
    $bobot = $this->db->get('ahp_bobot_kriteria')->row();
    $data=array();
    foreach ($tabel as $key => $value) {
      $C1 = $value->atap * $bobot->{"C1"};
      $C2 = $value->atap * $bobot->{"C2"};
      $C3 = $value->atap * $bobot->{"C3"};
      $C4 = $value->atap * $bobot->{"C4"};
      $C5 = $value->atap * $bobot->{"C5"};
      $nilai=$C1+$C2+$C3+$C4+$C5;
      $item = [
        'id_alternatif' => $value->id_alternatif,
        'nama' => $value->nama,
        'C1' => $C1,
        'C2' => $C2,
        'C3' => $C3,
        'C4' => $C4,
        'C5' => $C5,
        'nilai' => $nilai
      ];
      array_push($data, $item);
    }
    $this->db->empty_table('ahp_rangking');
    $this->db->insert_batch('ahp_rangking', $data);
    $this->db->order_by('nilai','desc');
    return $this->db->get('ahp_rangking')->result();
  }
}
