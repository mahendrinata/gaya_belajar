<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pengguna extends App_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Pengguna_model');
  }

  public function index() {
    $this->data['pengguna'] = $this->Pengguna_model->get_all_active(App_Controller::$PAGE);

    $this->pagination_create($this->data['pengguna']['count']);

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function view($id = NULL) {
    $this->data['pengguna'] = $this->Pengguna_model->get($id);
    $this->data['title'] = 'Detail Pengguna ' . $this->data['pengguna']['nama'];
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function add() {
    if ($this->form_validation->run()) {
      $pengguna = App_Controller::$POST_DATA;
      $pengguna['password'] = md5($pengguna['password']);
      unset($pengguna['confirmation_password']);
      $add = $this->Pengguna_model->insert($pengguna);
      $this->show_message('insert', $add);
      redirect('admin/pengguna');
    } else {
      $this->data['title'] = 'Pengguna Baru';
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function edit($id = NULL) {
    if ($this->form_validation->run('nama')) {
      $pengguna = App_Controller::$POST_DATA;
      if (!empty($pengguna['password'])) {
        $pengguna['password'] = md5($pengguna['password']);
      } else {
        unset($pengguna['password']);
      }
      unset($pengguna['confirmation_password']);

      $update = $this->Pengguna_model->update($id, $pengguna);
      $this->show_message('update', $update);
      redirect('admin/pengguna');
    } else {
      $this->data['title'] = 'Ubah Pengguna';
      $this->data['pengguna'] = $this->Pengguna_model->get($id);
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function delete($id = NULL) {
    $delete = $this->Pengguna_model->delete($id);
    $this->show_message('delete', $delete);
    redirect('admin/pengguna');
  }

  public function edit_account() {
    if ($this->form_validation->run('nama')) {
      $pengguna = App_Controller::$POST_DATA;
      $update = $this->Pengguna_model->update(App_Controller::$USER['id'], $pengguna);
      $this->show_message('update', $update);
      redirect('admin/pengguna');
    } else {
      $this->data['title'] = 'Ubah Akun';
      $this->data['pengguna'] = $this->Pengguna_model->get(App_Controller::$USER['id']);
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function change_password() {
    if ($this->form_validation->run('password')) {
      $pengguna = App_Controller::$POST_DATA;
      $pengguna['password'] = md5($pengguna['password']);
      unset($pengguna['confirmation_password']);
      $update = $this->Pengguna_model->update(App_Controller::$USER['id'], $pengguna);
      $this->show_message('update', $update);
      redirect('admin/pengguna');
    } else {
      $this->data['title'] = 'Ganti Password';
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

}

?>