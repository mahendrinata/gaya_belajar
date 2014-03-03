<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Anjuran_model extends App_Model {

  public $_table = "anjuran";
  public $belongs_to = array('karakter');

  public function get_all_anjuran($get = array(), $page = NULL, $limit = 10) {
    $this->limit($limit, $page);
    
    if (isset($get['nama']) && !empty($get['nama'])) {
      $this->load->model('Karakter_model');
      $karakter = $this->Karakter_model->get_many_by(array('nama_karakter LIKE' => '%' . $get['nama'] . '%'));
      $in = array();
      foreach ($karakter as $k){
        $in[] = $k['id'];
      }
      $this->_database->where_in('karakter_id', $in);
    }

    $return['data'] = $this->with('karakter')->get_all();
    $return['count'] = $this->count_all();

    return $return;
  }

}

?>