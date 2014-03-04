<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Konsultasi_model extends App_Model {

  public $_table = "konsultasi";

  public function get_all_konsultasi($get = array(), $page = NULL, $limit = 10, $default_order = TRUE) {
    $page = (empty($page)) ? 0 : $page;

    $this->load->model('Karakter_model');
    $karakter = $this->Karakter_model->get_all();
    $karakter_query = array();
    foreach ($karakter as $k) {
      $karakter_query[] = '(SELECT COUNT(jawaban.karakter_id) '
        . 'FROM konsultasi '
        . 'INNER JOIN jawaban ON jawaban.id = konsultasi.jawaban_id '
        . 'WHERE konsultasi.pengguna_id = pengguna.id AND jawaban.karakter_id =' . $k['id'] . ') AS ' . url_title($k['nama_karakter'], '_', TRUE);
    }
    $karakter_query[] = '(SELECT COUNT(jawaban.karakter_id) '
      . 'FROM konsultasi '
      . 'INNER JOIN jawaban ON jawaban.id = konsultasi.jawaban_id '
      . 'WHERE konsultasi.pengguna_id = pengguna.id) AS jumlah ';

    $karakter_str = implode(',', $karakter_query);

    if (!empty($limit)) {
      $limit = 'LIMIT ' . $page . ',' . $limit;
    }

    $where = '';
    if (!empty($get['tanggal']) || !empty($get['nama'])) {
      $where = 'WHERE ';
    }

    if (!empty($get['tanggal'])) {
      $where .= 'konsultasi.tanggal = "' . $get['tanggal'] . '"';
    }

    if (!empty($get['nama'])) {
      
    }

    if ($default_order) {
      $order = 'konsultasi.tanggal DESC';
    } else {
      $order = 'pengguna.kelas ASC';
    }

    $return = $this->db->query(
        'SELECT pengguna.id, pengguna.nama, pengguna.tempat_lahir, pengguna.tanggal_lahir, pengguna.jenis_kelamin, pengguna.alamat, pengguna.agama, pengguna.kelas, pengguna.asal_sekolah, konsultasi.tanggal, ' . $karakter_str . ' ' .
        'FROM pengguna ' .
        'INNER JOIN konsultasi ON konsultasi.pengguna_id = pengguna.id ' .
        $where . ' ' .
        'GROUP BY pengguna.id, pengguna.nama, pengguna.tempat_lahir, pengguna.tanggal_lahir, pengguna.jenis_kelamin, pengguna.alamat, pengguna.agama, pengguna.kelas, pengguna.asal_sekolah, konsultasi.tanggal ' .
        'ORDER BY ' . $order . ' ' . $limit
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

    $konsultasi = array('total' => 0, 'data' => array(), 'karakter' => array(), 'tanggal' => NULL);
    $max = array();
    foreach ($data as $konsul) {
      $max[] = $konsul['jumlah'];
    }

    if (!empty($max)) {
      $for_max = max($max);
    }
    foreach ($data as $konsul) {
      $konsultasi['data'][$konsul['id']] = $konsul;
      if ($konsul['jumlah'] >= $for_max) {
        $max = $konsul['jumlah'];
        $konsultasi['karakter'][] = $konsul['id'];
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

  public function get_laporan($ids = array(), $active_karakter = array()) {
    $konsultasi = $this->get_all_konsultasi(NULL, NULL, FALSE);
    $d_karakter = $karakter = $this->Karakter_model->get_all();
    for ($i = 0; $i < count($karakter); $i++) {
      if (in_array($karakter[$i]['id'], $ids)) {
        unset($karakter[$i]);
      }
    }
    $return = array();
    foreach ($konsultasi as $konsul) {
      $data = array();
      $max_k = array();
      foreach ($d_karakter as $d_k) {
        $max_k[] = $konsul[url_title($d_k['nama_karakter'], '_', TRUE)];
      }
      $max = max($max_k);
      foreach ($karakter as $k) {
        foreach ($active_karakter as $a_k) {
          if ($konsul[url_title($a_k['nama_karakter'], '_', TRUE)] == $max && $konsul[url_title($a_k['nama_karakter'], '_', TRUE)] > $konsul[url_title($k['nama_karakter'], '_', TRUE)]) {
            $data[] = TRUE;
          }
        }
      }
      if (count($ids) == 1) {
        if (count($data) == count($karakter)) {
          $return[] = $konsul;
        }
      } else {
        if (count($data) == count($active_karakter)) {
          $return[] = $konsul;
        }
      }
    }
    return $return;
  }

}

?>