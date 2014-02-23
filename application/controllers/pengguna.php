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

  public function login() {
    $this->data['title'] = 'Login';
    if (isset(App_Controller::$USER) && !empty(App_Controller::$USER)) {
      redirect('admin/halaman');
    }

    if ($this->form_validation->run()) {
      $user = $this->Pengguna_model->get_by(array(
        'username' => App_Controller::$POST_DATA['username'],
      ));

      if (!empty($user) && (md5(App_Controller::$POST_DATA['password']) === $user['password'])) {
        $this->show_message('login', TRUE, 'Anda Berhasil login, Selamat Datang.');

        $this->session->set_userdata('user', $user);
        redirect('admin/halaman');
      } else {
        $this->show_message('login', FALSE, 'Maaf, Username atau Password anda salah.');
        redirect('login');
      }
    }
    $this->load->view('layout/blank', $this->data);
  }

  public function logout() {
    $this->session->sess_destroy();
    $this->show_message('logout', TRUE, 'Anda berhasil logout.');
    redirect('login');
  }

  public function register() {
    if ($this->form_validation->run('pengguna/add')) {
      $pengguna = App_Controller::$POST_DATA;
      $pengguna['password'] = md5($pengguna['password']);
      unset($pengguna['confirmation_password']);
      $pengguna['level'] = Level::SISWA;
      $add = $this->Pengguna_model->insert($pengguna);
      $this->show_message('insert', $add);
      redirect('login');
    } else {
      $this->data['title'] = 'Daftar menjadi member';
      $this->data['layout'] = 'content/guest/pengguna/register';
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

}

?>