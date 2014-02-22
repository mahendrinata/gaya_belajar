<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Admin_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();
    if (!isset(App_Controller::$USER) || empty(App_Controller::$USER)) {
      $this->show_message('access', FALSE);
      redirect('login');
    }
    
    $this->load->model('Karakter_model');
    $this->data['menu_karakter'] = $this->Karakter_model->get_all();
  }
  
  public function check_access($access = array()){
    if(!in_array(App_Controller::$USER['level'], $access)){
      $this->show_message('access', FALSE);
      redirect('admin/halaman');
    }
  }

}

?>