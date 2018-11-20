<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_Kriteria extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function input()
  {
    $this->db->empty_table('ahp_preferensi_kriteria');
    $data = array();
    for ($i=1; $i <= 5 ; $i++) {
      for ($j=$i+1; $j <= 5 ; $j++) {
        $item = [
          'id_kriteria_1' => $this->input->post('k1_'.$i.$j),
          'id_kriteria_2' =>  $this->input->post('k2_'.$i.$j),
          'nilai' => $this->input->post('i'.$i.$j)
        ];
        array_push($data, $item);

        $item = [
          'id_kriteria_1' => $this->input->post('k2_'.$i.$j),
          'id_kriteria_2' =>  $this->input->post('k1_'.$i.$j),
          'nilai' => 1/$this->input->post('i'.$i.$j)
        ];
        array_push($data, $item);
      }

      $item = [
        'id_kriteria_1' => $i,
        'id_kriteria_2' =>  $i,
        'nilai' => 1
      ];
      array_push($data, $item);
    }

    $this->db->insert_batch('ahp_preferensi_kriteria', $data);
  }

  function normalisasi()
  {
    for($i=1;$i<=5;$i++)
    {
      $this->db->where('id_kriteria_2',$i);
      $tabel[$i] = $this->db->get('ahp_preferensi_kriteria')->result();

      $total[$i] = 0;
      foreach ($tabel[$i] as $key => $list) {
        $total[$i] += $list->nilai;
      }
    }

    $data=array();
    for($i=1;$i<=5;$i++)
    {
      $this->db->where('id_kriteria_2',$i);
      $tabel[$i] = $this->db->get('ahp_preferensi_kriteria')->result();
      foreach ($tabel[$i] as $key => $list) {
        $item = [
          'id_kriteria_1' => $list->id_kriteria_1,
          'id_kriteria_2' => $list->id_kriteria_2,
          'nilai' => $list->nilai/$total[$i]
        ];
        array_push($data, $item);
      }
    }
    $this->db->empty_table('ahp_preferensi_kriteria_ternormalisasi');
    $this->db->insert_batch('ahp_preferensi_kriteria_ternormalisasi', $data);
  }

  function pembobotan()
  {
    for($i=1;$i<=5;$i++)
    {
      $this->db->where('id_kriteria_1',$i);
      $tabel[$i] = $this->db->get('ahp_preferensi_kriteria_ternormalisasi')->result();
      $bobot[$i]=0;
      foreach ($tabel[$i] as $key => $list) {
        $bobot[$i]+=$list->nilai/5;
      }
    }
    $item = [
      'C1' => $bobot[1],
      'C2' => $bobot[2],
      'C3' => $bobot[3],
      'C4' => $bobot[4],
      'C5' => $bobot[5],
      'aktif' => 1
    ];
    $this->db->empty_table('ahp_bobot_kriteria');
    $this->db->insert('ahp_bobot_kriteria', $item);
  }

  function konsistensi()
  {
    $this->db->where('aktif',1);
    $tabel2 = $this->db->get('ahp_bobot_kriteria')->row();

    for($i=1;$i<=5;$i++)
    {
      $this->db->where('id_kriteria_1',$i);
      $tabel1 = $this->db->get('ahp_preferensi_kriteria')->result();
      $hasil[$i]=0;
      foreach ($tabel1 as $key => $row) {
        $j = $key+1;
        $hasil[$i]+=$row->nilai * $tabel2->{"C$j"};
      }
    }

    $t=0;
    for($i=1;$i<=5;$i++)
    {
      $t+=($hasil[$i]/$tabel2->{"C$i"});
    }

    $t=$t/5;
    $t=($t-5)/4;
    $t=$t/1.12;
    var_dump($t);
    if($t==0) $konsistensi='sangat konsisten';
    else if($t<=0.1) $konsistensi='cukup konsisten';
    else $konsistensi='kurang konsisten';
    $item=[
      'id_konsistensi' => 1,
      'nilai' =>$t,
      'konsistensi' => $konsistensi
    ];
    $this->db->empty_table('ahp_konsistensi');
    $this->db->insert('ahp_konsistensi', $item);
  }

  function get_kriteria()
  {
    $this->db->select('nama_kriteria');
    return $this->db->get('ahp_data_kriteria')->result_array();
  }

  function get_kriteria1()
  {
    $this->db->select('nama_kriteria');
    return $this->db->get('ahp_data_kriteria')->result();
  }

  function get_preferensi()
  {
    $this->db->order_by('id_kriteria_1','asc');
    $this->db->order_by('id_kriteria_2','asc');
    return $this->db->get('ahp_preferensi_kriteria')->result();
  }

  function get_preferensi_ternormalisasi()
  {
    $this->db->order_by('id_kriteria_1','asc');
    $this->db->order_by('id_kriteria_2','asc');
    return $this->db->get('ahp_preferensi_kriteria_ternormalisasi')->result();
  }

  function get_bobot()
  {
    return $this->db->get('ahp_bobot_kriteria')->result();
  }

  function get_konsistensi()
  {
    return $this->db->get('ahp_konsistensi')->result();
  }
}
