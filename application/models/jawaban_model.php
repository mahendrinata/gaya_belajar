<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Jawaban_model extends App_Model {

  public $_table = "jawaban";
  public $belongs_to = array('pertanyaan');

}

?>