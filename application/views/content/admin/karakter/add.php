<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/karakter/add', array('class' => 'form-horizontal'));
echo bootstrap_form_input('nama_karakter', NULL, array('class' => 'span6', 'placeholder' => 'Nama', 'label' => 'Nama' . bootstrap_text_important()));
echo bootstrap_form_textarea('keterangan', NULL, array('class' => 'span8', 'placeholder' => 'Keterangan', 'rows' => 6, 'label' => 'Alamat'));
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Simpan', array('class' => 'btn btn-primary', 'after' => anchor('admin/karakter', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>