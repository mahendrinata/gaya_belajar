<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Model use to add all behavior model
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_Model extends Behavior_Model {

  protected $return_type = 'array';
  public $before_create = array('created_at', 'updated_at');
  public $before_update = array('updated_at');
  
}

?>