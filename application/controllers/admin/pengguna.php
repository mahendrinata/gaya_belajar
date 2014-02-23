<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pengguna extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Pengguna_model');
  }

  public function index() {
    $this->check_access(array(Level::ADMIN));

    $this->data['pengguna'] = $this->Pengguna_model->get_all_active(App_Controller::$PAGE);

    $this->pagination_create($this->data['pengguna']['count']);

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function view($id = NULL) {
    $this->check_access(array(Level::ADMIN));

    $this->data['pengguna'] = $this->Pengguna_model->get($id);
    $this->data['title'] = 'Detail Pengguna ' . $this->data['pengguna']['nama'];
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function add() {
    $this->check_access(array(Level::ADMIN));

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
    $this->check_access(array(Level::ADMIN));

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
    $this->check_access(array(Level::ADMIN));

    $delete = $this->Pengguna_model->delete($id);
    $this->show_message('delete', $delete);
    redirect('admin/pengguna');
  }

  public function edit_account() {
    if ($this->form_validation->run('nama')) {
      $pengguna = App_Controller::$POST_DATA;
      $update = $this->Pengguna_model->update(App_Controller::$USER['id'], $pengguna);
      $this->show_message('update', $update);
      redirect('admin/halaman');
    } else {
      $this->data['title'] = 'Ubah Akun';
      $this->data['pengguna'] = $this->Pengguna_model->get(App_Controller::$USER['id']);
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function change_password() {
    if ($this->form_validation->run('password')) {
      $pengguna = $this->Pengguna_model->get(App_Controller::$USER['id']);
      if (md5(App_Controller::$POST_DATA['old_password']) == $pengguna['password']) {
        $update = $this->Pengguna_model->update($pengguna['id'], array('password' => md5(App_Controller::$POST_DATA['password'])));
        $this->show_message('update', $update);
        redirect('admin/halaman');
      } else {
        $this->show_message('update', FALSE, 'Maaf, Password Lama anda salah.');
        redirect('admin/pengguna/change_password');
      }
    } else {
      $this->data['title'] = 'Ganti Password';
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

}

?>