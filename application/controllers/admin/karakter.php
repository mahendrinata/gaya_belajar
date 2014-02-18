<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Karakter extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Karakter_model');
  }

  public function index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['karakter'] = $this->Karakter_model->get_all_karakter(App_Controller::$PAGE);

    $this->pagination_create($this->data['karakter']['count']);

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function view($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['karakter'] = $this->Karakter_model->get($id);
    $this->data['title'] = 'Detail Karakter ' . $this->data['karakter']['nama_karakter'];
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function add() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('nama_karakter')) {
      $add = $this->Karakter_model->insert(App_Controller::$POST_DATA);
      $this->show_message('insert', $add);
      redirect('admin/karakter');
    } else {
      $this->data['title'] = 'Karakter Baru';
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function edit($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('nama_karakter')) {
      $update = $this->Karakter_model->update($id, App_Controller::$POST_DATA);
      $this->show_message('update', $update);
      redirect('admin/karakter');
    } else {
      $this->data['title'] = 'Ubah Karakter';
      $this->data['karakter'] = $this->Karakter_model->get($id);
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function delete($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $delete = $this->Karakter_model->delete($id);
    $this->show_message('delete', $delete);
    redirect('admin/karakter');
  }

}

?>