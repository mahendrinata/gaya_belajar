<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Konsultasi extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Konsultasi_model');
  }

  public function index($template = TRUE) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $get = $this->input->get();

    $this->data['title'] = 'Riwayat Konsultasi';
    $this->data['konsultasi'] = $this->Konsultasi_model->get_all_konsultasi($get, App_Controller::$PAGE);

    $this->load->model('Pengguna_model');
    $count = $this->Pengguna_model->count_all();
    $this->pagination_create($count, $this->get_suffix_params());

    $this->data['suffix'] = $this->get_suffix_params();

    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->get_all();

    if ($template) {
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function print_index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $get = $this->input->get();

    $this->data['title'] = 'Riwayat Konsultasi';
    $this->data['konsultasi'] = $this->Konsultasi_model->get_all_konsultasi($get, App_Controller::$PAGE, NULL);
    $this->data['pagination'] = NULL;

    $this->data['suffix'] = $this->get_suffix_params();

    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->get_all();

    $this->data['layout'] = 'content/admin/konsultasi/index';
    $this->load->view('layout/print', $this->data);
  }

  public function jawaban() {
    $insert = $this->Konsultasi_model->insert_konsultasi(App_Controller::$USER, App_Controller::$POST_DATA);
    $this->show_message('insert', $insert);
    redirect('admin/konsultasi/hasil');
  }

  public function hasil($user_id = NULL, $template = TRUE) {
    $this->check_access(array(Level::ADMIN, Level::SISWA));

    $this->load->model('Pengguna_model');
    if (empty($user_id)) {
      $this->data['pengguna'] = $this->Pengguna_model->get(App_Controller::$USER['id']);
    } else {
      $this->data['pengguna'] = $this->Pengguna_model->get($user_id);
    }

    $this->data['user_id'] = $user_id;

    $this->load->model('Karakter_model');
    $this->data['konsultasi'] = $this->Konsultasi_model->get_hasil(App_Controller::$USER);
    $this->data['karakter'] = (empty($this->data['konsultasi']['karakter'])) ? array() : $this->Karakter_model->with('anjuran')->get_many($this->data['konsultasi']['karakter']);

    if ($template) {
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function reset() {
    $delete = $this->Konsultasi_model->delete_by(array('pengguna_id' => App_Controller::$USER['id']));
    $this->show_message('delete', $delete);
    redirect('admin/pertanyaan/konsultasi');
  }

  public function print_hasil($user_id = NULL) {
    $this->hasil($user_id, FALSE);
    
    $this->data['layout'] = 'content/admin/konsultasi/hasil';
    $this->load->view('layout/print', $this->data);
  }

  public function laporan($id = NULL, $template = TRUE) {
    $this->load->model('Karakter_model');
    $ids = explode('-', $id);
    $this->data['karakter'] = $karakter = $this->Karakter_model->get_many($ids);

    $nama = array();
    foreach ($karakter as $k) {
      $this->data['id'][] = $k['id'];
      $this->data['nama'][] = $nama[] = $k['nama_karakter'];
    }

    $this->data['title'] = 'Daftar siswa dengan gaya belajar ' . implode(" - ", $nama);

    $this->data['konsultasi'] = $this->Konsultasi_model->get_laporan($ids, $karakter);

    if ($template) {
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function print_laporan($id = NULL) {
    $this->laporan($id, FALSE);

    $this->data['layout'] = 'content/admin/konsultasi/laporan';
    $this->load->view('layout/print', $this->data);
  }

}
