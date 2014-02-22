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

    $this->data['title'] = 'Riwayat Konsultasi';
    $this->data['konsultasi'] = $this->Konsultasi_model->get_all_konsultasi(App_Controller::$PAGE);
    
    $this->load->model('Pengguna_model');
    $count = $this->Pengguna_model->count_all();
    $this->pagination_create($count);
    
    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->get_all();

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }
  
  public function print_index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['title'] = 'Riwayat Konsultasi';
    $this->data['konsultasi'] = $this->Konsultasi_model->get_all_konsultasi(App_Controller::$PAGE, NULL);
    $this->data['pagination'] = NULL;
    
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

  public function hasil($template = TRUE) {
    $this->load->model('Pengguna_model');
    $this->data['pengguna'] = $this->Pengguna_model->get(App_Controller::$USER['id']);
    $this->load->model('Karakter_model');
    $this->data['konsultasi'] = $this->Konsultasi_model->get_hasil(App_Controller::$USER);
    $this->data['karakter'] = (empty($this->data['konsultasi']['karakter'])) ? array() : $this->Karakter_model->with('anjuran')->get($this->data['konsultasi']['karakter']);

    if ($template) {
      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function reset() {
    $delete = $this->Konsultasi_model->delete_by(array('pengguna_id' => App_Controller::$USER['id']));
    $this->show_message('delete', $delete);
    redirect('admin/pertanyaan/konsultasi');
  }
  
  public function print_hasil(){
    $this->hasil(FALSE);
    
    $this->data['layout'] = 'content/admin/konsultasi/hasil';
    $this->load->view('layout/print', $this->data);
  }

}
