<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pengguna extends Admin_Controller {

  public function register() {
    $this->data['title'] = 'Daftar Perusahaan atau Anggota';

    $this->form_validation->set_rules($this->User->validate);
    if ($this->form_validation->run()) {
      $register = $this->User->insert($user, TRUE);
      if ($register) {
        $this->show_message('insert', $register, 'Now, You registered as ' . ucfirst(App_Controller::$POST_DATA['role'] . ' in SIPSIKO'));
        redirect('login');
      } else {
        $this->show_message('insert', $register);
      }
    }
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function set_new_password($code) {
    $this->data['title'] = 'Ganti Password Akun SIPSIKO';
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('password_confirmation', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');
    if ($this->form_validation->run()) {
      $user = $this->set_encrype_user_data(App_Controller::$POST_DATA);
      $update = $this->User->update_by(array('code' => $code), array('password' => $user['password'], 'activation_code' => NULL), TRUE);
      $this->show_message('update', $update);
      redirect('login');
    }
    $this->data['code'] = $code;
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function login() {
    $this->data['title'] = 'Login Akun SIPSIKO';
    if (isset(App_Controller::$USER) && !empty(App_Controller::$USER)) {
      redirect(strtolower(App_Controller::$USER['role']) . '/homes');
    }

    if ($this->form_validation->run()) {
      $user = $this->User->get_by(array(
        'username' => App_Controller::$POST_DATA['username'],
        'status' => Status::ACTIVE));

      if (!empty($user) && $this->get_validate_password(App_Controller::$POST_DATA['password'], $user)) {
        $this->show_message('login', TRUE, 'You success login.');

        $this->session->set_userdata('user', $user);
        redirect(strtolower($user['role']) . '/homes');
      } else {
        $this->show_message('login', FALSE, 'Sorry, Your username or password is wrong.');
      }
    }

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function logout() {
    $this->session->sess_destroy();
    $this->show_message('logout', TRUE, 'You success logout.');
    redirect('login');
  }

}

?>