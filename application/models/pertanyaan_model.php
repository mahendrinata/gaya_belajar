<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pertanyaan_model extends App_Model {

  public $_table = "pertanyaan";
  public $has_many = array('jawaban');

  public function get_all_pertanyaan($page = NULL, $limit = 10) {
    $this->limit($limit, $page);

    $return['data'] = $this->with('jawaban')->get_all();
    $return['count'] = $this->count_all();

    return $return;
  }

  public function insert_pertanyaan($data = array()) {
    $pertanyaan_id = $this->insert(array('pertanyaan' => $data['pertanyaan']));
    $this->load->model('Jawaban_model');
    foreach ($data['jawaban'] as $jawaban) {
      if (!empty($jawaban['jawaban'])) {
        $jawaban['pertanyaan_id'] = $pertanyaan_id;
        $this->Jawaban_model->insert($jawaban);
      }
    }
    return $pertanyaan_id;
  }

  public function update_pertanyaan($id = NULL, $data = array()) {
    $update = $this->update($id, array('pertanyaan' => $data['pertanyaan']));
    $this->load->model('Jawaban_model');
    $this->Jawaban_model->delete_by(array('pertanyaan_id' => $id));
    foreach ($data['jawaban'] as $jawaban) {
      if (!empty($jawaban['jawaban'])) {
        $jawaban['pertanyaan_id'] = $id;
        $this->Jawaban_model->insert($jawaban);
      }
    }
    return $update;
  }

  public function get_pertanyaan_konsultasi() {
    $this->order_by('RAND()', NULL);
    $pertanyaan = $this->get_all();
    $data = array();
    $i = 0;
    $this->load->model('Jawaban_model');
    foreach ($pertanyaan as $p) {
      $data[$i] = $p;
      $this->Jawaban_model->order_by('RAND()', NULL);
      $data[$i]['jawaban'] = $this->Jawaban_model->get_many_by(array('pertanyaan_id' => $p['id']));
      $i++;
    }
    return $data;
  }

}

?>