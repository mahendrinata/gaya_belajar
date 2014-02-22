<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Halaman extends Admin_Controller {

  public function index() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }
  
  public function about(){
    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->get_all();
    
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

}

?>