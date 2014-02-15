<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

abstract class Level {

  const ADMIN = 'ADMIN';
  const PAKAR = 'PAKAR';
  const SISWA = 'SISWA';
  const GUEST = 'GUEST';

  public static function get_list() {
    return array(
      Level::ADMIN,
      Level::PAKAR,
      Level::SISWA,
      Level::GUEST
    );
  }

  public static function get_priority() {
    $roles = Level::get_list();
    foreach ($roles as $key => $value) {
      $priorities[$value] = $key;
    }
    return $priorities;
  }

  public static function get_map() {
    $map = array();
    foreach (Status::get_list() as $status) {
      $map[$status] = $status;
    }
    return $map;
  }

  public static function get_access($role = NULL) {
    $priorities = Level::get_priority();
    $accesses = array();
    foreach ($priorities as $key => $value) {
      if ($priorities[$role] >= $value) {
        $accesses[$key] = $value;
      }
    }
    return $accesses;
  }

}

?>