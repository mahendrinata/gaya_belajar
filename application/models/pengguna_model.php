<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pengguna_model extends App_Model {

  public $_table = "pengguna";

  public function get_all_active($get = array(), $page = NULL, $limit = 10) {
    $conditions = array(
      'level !=' => Level::ADMIN
    );
    if(isset($get['nama']) && !empty($get['nama'])){
      $conditions['nama LIKE'] = '%'.$get['nama'].'%'; 
    }

    $this->limit($limit, $page);

    $this->order_by('nama');
    $return['data'] = $this->get_many_by($conditions);
    $return['count'] = $this->count_by($conditions);
    
    return $return;
  }

}

?>