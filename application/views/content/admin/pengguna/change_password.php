<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/pengguna/change_password', array('class' => 'form-horizontal'));
echo bootstrap_form_password('old_password', NULL, array('class' => 'span6', 'placeholder' => 'Password Sekarang', 'label' => 'Password Sekarang' . bootstrap_text_important()));
echo bootstrap_form_password('password', NULL, array('class' => 'span6', 'placeholder' => 'Password Baru', 'label' => 'Password Baru' . bootstrap_text_important()));
echo bootstrap_form_password('confirmation_password', NULL, array('class' => 'span6', 'placeholder' => 'Konfirmasi Password', 'label' => 'Konfirmasi Password' . bootstrap_text_important()));
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Ganti Password', array('class' => 'btn btn-primary', 'after' => anchor('admin/pengguna', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>