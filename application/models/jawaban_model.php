<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Jawaban_model extends App_Model {

  public $_table = "jawaban";
  public $belongs_to = array('pertanyaan');

}

?>