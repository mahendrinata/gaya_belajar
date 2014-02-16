<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/pertanyaan/edit/' . $pertanyaan['id'], array('class' => 'form-horizontal'));
echo bootstrap_form_textarea('pertanyaan', $pertanyaan['pertanyaan'], array('class' => 'span8', 'placeholder' => 'Pertanyaan', 'rows' => 6, 'label' => 'Pertanyaan' . bootstrap_text_important()));
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Simpan', array('class' => 'btn btn-primary', 'after' => anchor('admin/pertanyaan', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>