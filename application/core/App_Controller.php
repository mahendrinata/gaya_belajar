<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class App_Controller extends CI_Controller {

  protected static $OFFSET = 4;
  protected static $LIMIT = 10;
  protected static $ID;
  protected static $UID;
  protected static $PAGE;
  protected static $LAYOUT;
  protected static $ACTIVE_SESSION;
  protected static $POST_DATA;
  protected static $DIRECTORY;
  protected static $CLASS;
  protected static $METHOD;
  protected static $USER;
  protected $data = array();

  public function __construct() {
    parent::__construct();

    $this->initialize();
  }

  private function initialize() {
    App_Controller::$DIRECTORY = $this->data['directory'] = str_replace('/', '', $this->router->directory);
    App_Controller::$CLASS = $this->data['class'] = $this->router->class;
    App_Controller::$METHOD = $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    App_Controller::$ID = $this->uri->segment(4);
    App_Controller::$PAGE = $this->data['offset'] = $this->uri->segment(4);

    App_Controller::$ACTIVE_SESSION = $this->session->all_userdata();
    if (isset(App_Controller::$ACTIVE_SESSION['user']) && !empty(App_Controller::$ACTIVE_SESSION['user'])) {
      App_Controller::$USER = $this->data['user_login'] = App_Controller::$ACTIVE_SESSION['user'];
    }

    App_Controller::$POST_DATA = $this->input->post();

    App_Controller::$LAYOUT = 'layout/default';

    $this->data['title'] = $this->get_title();
  }

  protected function show_message($action = NULL, $callback_action = FALSE, $message = NULL) {
    $callback_action = ($callback_action != FALSE) ? TRUE : FALSE;
    
    $actions = array(
      'insert' => array(
        TRUE => 'Data berhasil dibuat..',
        FALSE => 'Data gagal dibuat.'),
      'update' => array(
        TRUE => 'Data berhasil diubah.',
        FALSE => 'Data Gagal Diubah.'),
      'delete' => array(
        TRUE => 'Data berhasil dihapus.',
        FALSE => 'Data gagal dihapus.'),
      'redirect' => array(
        TRUE => 'Halaman yang anda akses benar.',
        FALSE => 'Terjadi kesalahan pada halaman yang anda akses.'),
      'access' => array(
        TRUE => 'Anda dapat mengakses halaman ini',
        FALSE => 'Anda tidak memiliki akses ha ini'),
    );

    $message = (empty($message)) ? $actions[$action][$callback_action] : $message;
    $this->session->set_flashdata('message', array('alert' => ($callback_action) ? 'success' : 'error', 'message' => $message));
  }

  protected function pagination_create($count = NULL, $suffix = NULL, $limit = NULL, $offset = NULL, $url = NULL, $return = FALSE) {
    $config = $this->set_pagination($count, $suffix, $limit, $offset, $url);
    $this->pagination->initialize($config);
    if (!$return) {
      $this->data['pagination'] = $this->get_pagination();
    } else {
      return $this->get_pagination();
    }
  }

  protected function set_pagination($count = NULL, $suffix = NULL, $limit = NULL, $offset = NULL, $site_url = NULL) {
    $config['base_url'] = site_url((empty($site_url) ? $this->get_site_url_pagination() : $site_url));
    $config['total_rows'] = $count;
    $config['per_page'] = (empty($limit)) ? self::$LIMIT : $limit;
    $config['uri_segment'] = (empty($offset)) ? self::$OFFSET : $offset;
    $config['suffix'] = $suffix;
    return $config;
  }

  protected function get_pagination() {
    return $this->pagination->create_links();
  }

  protected function get_site_url_pagination() {
    $dir = (empty(App_Controller::$DIRECTORY)) ? '' : App_Controller::$DIRECTORY . '/';
    return $dir . App_Controller::$CLASS . '/' . App_Controller::$METHOD;
  }

  protected function get_offset_from_segment($offset = NULL) {
    $offset = (empty($offset)) ? self::$OFFSET : $offset;
    return $this->uri->segment($offset);
  }

  protected function get_suffix_params() {
    $suffix = '';
    if (isset($_GET) && !empty($_GET)) {
      $str = array();
      foreach ($_GET as $key => $value) {
        $str[] = $key . '=' . $value;
      }
      $suffix = '?' . implode('&', $str);
    }
    return $suffix;
  }

  protected function get_title() {
    if ($this->data['method'] == 'index') {
      return ucwords(App_Controller::$CLASS . ' management');
    } else {
      return ucwords(App_Controller::$METHOD . ' ' . App_Controller::$CLASS);
    }
  }

}

?>