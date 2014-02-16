<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/anjuran/add', array('class' => 'form-horizontal'));
echo bootstrap_form_dropdown('karakter_id', array(), array('class' => 'span6', 'list' => $karakter, 'label' => 'Karakter' . bootstrap_text_important()));
echo bootstrap_form_textarea('anjuran', NULL, array('class' => 'span8', 'placeholder' => 'Anjuran', 'rows' => 10, 'label' => 'Anjuran' . bootstrap_text_important()));
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Simpan', array('class' => 'btn btn-primary', 'after' => anchor('admin/anjuran', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>