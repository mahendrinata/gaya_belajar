<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Karakter_model extends App_Model {

  public $_table = "karakter";

  public function get_all_karakter($page = NULL, $limit = 10) {
    $this->limit($limit, $page);

    $return['data'] = $this->get_all();
    $return['count'] = $this->count_all();
    
    return $return;
  }

}

?>