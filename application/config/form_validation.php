<?php

$config = array(
  'pengguna/login' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required'
    ),
  ),
  'pengguna/add' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|alpha_numeric|is_unique[pengguna.username]'
    ),
    array(
      'field' => 'nama',
      'label' => 'Nama Depan',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|min_length[5]'
    ),
    array(
      'field' => 'confirmation_password',
      'label' => 'Konfirmasi Password',
      'rules' => 'required|min_length[5]|matches[password]'
    )
  ),
  'nama' => array(
    array(
      'field' => 'nama',
      'label' => 'Nama',
      'rules' => 'required'
    ),
  ),
  'password' => array(
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|min_length[5]'
    ),
    array(
      'field' => 'confirmation_password',
      'label' => 'Konfirmasi Password',
      'rules' => 'required|min_length[5]|matches[password]'
    )
  ),
  'nama_karakter' => array(
    array(
      'field' => 'nama_karakter',
      'label' => 'Nama Karakter',
      'rules' => 'required'
    ),
  ),
  'anjuran' => array(
    array(
      'field' => 'karakter_id',
      'label' => 'Karakter',
      'rules' => 'required'
    ),
    array(
      'field' => 'anjuran',
      'label' => 'Anjuran',
      'rules' => 'required'
    ),
  ),
  'pertanyaan' => array(
    array(
      'field' => 'pertanyaan',
      'label' => 'Pertanyaan',
      'rules' => 'required'
    ),
  ),
);
?>
