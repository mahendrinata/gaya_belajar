<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pengguna_model extends App_Model {

  public $_table = "pengguna";

  public function get_all_active($page = NULL, $limit = 10) {
    $conditions = array(
      'level !=' => Level::ADMIN
    );

    $this->limit($limit, $page);

    $return['data'] = $this->Pengguna_model->get_many_by($conditions);
    $return['count'] = $this->count_by($conditions);
    
    return $return;
  }

}

?>