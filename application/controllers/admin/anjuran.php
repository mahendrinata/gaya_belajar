<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Anjuran extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Anjuran_model');
  }

  public function index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['anjuran'] = $this->Anjuran_model->get_all_anjuran(App_Controller::$PAGE);

    $this->pagination_create($this->data['anjuran']['count']);

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function view($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['anjuran'] = $this->Anjuran_model->with('karakter')->get($id);
    $this->data['title'] = 'Detail Anjuran';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function add() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('anjuran')) {
      $add = $this->Anjuran_model->insert(App_Controller::$POST_DATA);
      $this->show_message('insert', $add);
      redirect('admin/anjuran');
    } else {
      $this->data['title'] = 'Anjuran Baru';
      $this->load->model('Karakter_model');
      $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function edit($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('anjuran')) {
      $update = $this->Anjuran_model->update($id, App_Controller::$POST_DATA);
      $this->show_message('update', $update);
      redirect('admin/anjuran');
    } else {
      $this->data['title'] = 'Ubah Anjuran';
      $this->load->model('Karakter_model');
      $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');
      $this->data['anjuran'] = $this->Anjuran_model->get($id);
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function delete($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $delete = $this->Anjuran_model->delete($id);
    $this->show_message('delete', $delete);
    redirect('admin/anjuran');
  }

}

?>