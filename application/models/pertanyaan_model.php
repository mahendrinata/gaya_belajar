<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pertanyaan_model extends App_Model {

  public $_table = "pertanyaan";
  public $has_many = array('jawaban');

  public function get_all_pertanyaan($page = NULL, $limit = 10) {
    $this->limit($limit, $page);

    $return['data'] = $this->with('jawaban')->get_all();
    $return['count'] = $this->count_all();

    return $return;
  }

}

?>