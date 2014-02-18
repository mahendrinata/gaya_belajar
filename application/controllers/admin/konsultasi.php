<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Konsultasi extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Konsultasi_model');
  }

  public function index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['title'] = 'Konsultasi Siswa';
    $this->data['konsultasi'] = $this->Konsultasi_model->get_all_konsultasi();

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function jawaban() {
    $insert = $this->Konsultasi_model->insert_konsultasi(App_Controller::$USER, App_Controller::$POST_DATA);
    $this->show_message('insert', $insert);
    redirect('admin/konsultasi/hasil');
  }

  public function hasil() {
    $this->data['pengguna'] = App_Controller::$USER;
    $this->load->model('Karakter_model');
    $this->data['konsultasi'] = $this->Konsultasi_model->get_hasil(App_Controller::$USER);
    $this->data['karakter'] = $this->Karakter_model->with('anjuran')->get($this->data['konsultasi']['karakter']);

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function reset() {
    $delete = $this->Konsultasi_model->delete_by(array('pengguna_id' => App_Controller::$USER['id']));
    $this->show_message('delete', $delete);
    redirect('admin/pertanyaan/konsultasi');
  }

}