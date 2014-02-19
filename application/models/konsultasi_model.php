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

  public function get_hasil($pengguna = array()) {
    $data = $this->db->query(
        'SELECT karakter.id, karakter.nama_karakter, konsultasi.tanggal, COUNT(konsultasi.id) AS jumlah ' .
        'FROM konsultasi ' .
        'INNER JOIN jawaban ON jawaban.id = konsultasi.jawaban_id ' .
        'INNER JOIN karakter ON karakter.id = jawaban.karakter_id ' .
        'WHERE konsultasi.pengguna_id = "' . $pengguna['id'] . '"' .
        'GROUP BY karakter.id, karakter.nama_karakter, konsultasi.tanggal ' .
        'ORDER BY konsultasi.tanggal,karakter.id, karakter.nama_karakter '
      )->result_array();
    
    $konsultasi = array('total' => 0, 'data' => array(), 'karakter' => NULL, 'tanggal' => NULL);
    $max = 0;
    foreach ($data as $konsul){
      $konsultasi['data'][$konsul['id']] = $konsul;
      if($konsul['jumlah'] > $max){
        $max = $konsul['jumlah'];
        $konsultasi['karakter'] = $konsul['id'];
      }
      $konsultasi['total'] += $konsul['jumlah'];
      $konsultasi['tanggal'] = $konsul['tanggal'];
    }

    return $konsultasi;
  }

  public function insert_konsultasi($pengguna = array(), $data = array()) {
    $save = array();
    foreach ($data as $jawaban_id) {
      $save[] = array(
        'tanggal' => date('Y-m-d'),
        'jawaban_id' => $jawaban_id,
        'pengguna_id' => $pengguna['id']
      );
    }
    return $this->insert_many($save);
  }

}

?>