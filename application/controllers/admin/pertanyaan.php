<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Pertanyaan extends Admin_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Pertanyaan_model');
  }

  public function index() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['pertanyaan'] = $this->Pertanyaan_model->get_all_pertanyaan(App_Controller::$PAGE);

    $this->pagination_create($this->data['pertanyaan']['count']);

    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');

    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function view($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $this->data['pertanyaan'] = $this->Pertanyaan_model->with('jawaban')->get($id);
    $this->load->model('Karakter_model');
    $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');

    $this->data['title'] = 'Detail Pertanyaan';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function add() {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('pertanyaan')) {
      $add = $this->Pertanyaan_model->insert_pertanyaan(App_Controller::$POST_DATA);
      $this->show_message('insert', $add);
      redirect('admin/pertanyaan');
    } else {
      $this->data['title'] = 'Pertanyaan Baru';
      $this->load->model('Karakter_model');
      $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');

      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function edit($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    if ($this->form_validation->run('pertanyaan')) {
      $update = $this->Pertanyaan_model->update_pertanyaan($id, App_Controller::$POST_DATA);
      $this->show_message('update', $update);
      redirect('admin/pertanyaan');
    } else {
      $this->data['title'] = 'Ubah Pertanyaan';
      $this->data['pertanyaan'] = $this->Pertanyaan_model->with('jawaban')->get($id);
      $this->load->model('Karakter_model');
      $this->data['karakter'] = $this->Karakter_model->dropdown('id', 'nama_karakter');

      $this->load->view(App_Controller::$LAYOUT, $this->data);
    }
  }

  public function delete($id = NULL) {
    $this->check_access(array(Level::ADMIN, Level::PAKAR));

    $delete = $this->Pertanyaan_model->delete($id);
    $this->load->model('Jawaban_model');
    $this->Jawaban_model->delete_by(array('pertanyaan_id', $id));
    $this->show_message('delete', $delete);
    redirect('admin/pertanyaan');
  }

  public function konsultasi() {
    $this->data['title'] = 'Konsultasi';
    $this->load->model('Konsultasi_model');
    $this->data['konsultasi'] = $this->Konsultasi_model->count_by(array('pengguna_id' => App_Controller::$USER['id']));

    $this->data['pertanyaan'] = $this->Pertanyaan_model->with('jawaban')->get_all();
    
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

}

?>