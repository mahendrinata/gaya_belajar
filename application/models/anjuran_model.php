<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Anjuran_model extends App_Model {

  public $_table = "anjuran";
  public $belongs_to = array('karakter');

  public function get_all_anjuran($page = NULL, $limit = 10) {
    $this->limit($limit, $page);

    $return['data'] = $this->with('karakter')->get_all();
    $return['count'] = $this->count_all();

    return $return;
  }

}

?>