<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Karakter_model extends App_Model {

  public $_table = "karakter";
  public $has_many = array('anjuran', 'jawaban');

  public function get_all_karakter($page = NULL, $limit = 10) {
    $this->limit($limit, $page);

    $return['data'] = $this->get_all();
    $return['count'] = $this->count_all();

    return $return;
  }

}

?>