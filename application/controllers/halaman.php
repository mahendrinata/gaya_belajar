<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Halaman extends App_Controller {

  public function index() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

}

?>