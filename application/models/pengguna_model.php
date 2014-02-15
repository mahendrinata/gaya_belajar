<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pengguna_model extends App_Model {
  
  public $_table = "pengguna";

  public $validate = array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|alpha_numeric|is_unique[users.username]'
    ),
    array(
      'field' => 'first_name',
      'label' => 'Nama Depan',
      'rules' => 'required'
    ),
    array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required|valid_email|is_unique[users.email]'
    ),
    array(
      'field' => 'role',
      'label' => 'Role',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|min_length[5]'
    ),
    array(
      'field' => 'password_confirmation',
      'label' => 'Konfirmasi Password',
      'rules' => 'required|min_length[5]|matches[password]'
    )
  );

}

?>