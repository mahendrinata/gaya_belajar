<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Konsultasi_model extends App_Model {

  public $_table = "konsultasi";

  public function get_all_konsultasi($page = NULL, $limit = 10) {
    $page = (empty($page)) ? 0 : $page;
    
    $return = $this->db->query(
      'SELECT pengguna.nama, karakter.nama_karakter, COUNT(konsultasi.id) AS jumlah ' .
      'FROM konsultasi ' .
      'INNER JOIN pengguna ON pengguna.id = konsultasi.pengguna_id ' .
      'INNER JOIN jawaban ON jawaban.id = konsultasi.jawaban_id ' .
      'INNER JOIN karakter ON karakter.id = jawaban.karakter_id ' .
      'GROUP BY pengguna.nama, karakter.nama_karakter ' .
      'ORDER BY pengguna.nama, karakter.nama_karakter ' .
      'LIMIT ' . $page . ',' . $limit
    )->result_array();

    return $return;
  }
  
  public function insert_konsultasi($pengguna = array(), $data = array()){
    $save = array();
    foreach ($data as $jawaban_id){
      $save[] = array(
        'jawaban_id' => $jawaban_id,
        'pengguna_id' => $pengguna['id']
      );
    }
    return $this->insert_many($save);
  }

}

?>