<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/pengguna/edit/' . $pengguna['id'], array('class' => 'form-horizontal'));
echo bootstrap_form_input('nama', $pengguna['nama'], array('class' => 'span6', 'placeholder' => 'Nama', 'label' => 'Nama' . bootstrap_text_important()));
echo bootstrap_form_input('tempat_lahir', $pengguna['tempat_lahir'], array('class' => 'span6', 'placeholder' => 'Tempat Lahir', 'label' => 'Tempat Lahir'));
echo bootstrap_form_input('tanggal_lahir', $pengguna['tanggal_lahir'], array('class' => 'span6', 'placeholder' => 'Tempat Lahir', 'label' => 'Tanggal Lahir'));
echo bootstrap_form_dropdown('jenis_kelamin', array($pengguna['jenis_kelamin']), array('class' => 'span6', 'list' => array('L' => 'Laki - Laki', 'P' => 'Perempuan'), 'label' => 'Jenis Kelamin'));
echo bootstrap_form_textarea('alamat', $pengguna['alamat'], array('class' => 'span8', 'placeholder' => 'Alamat', 'rows' => 6, 'label' => 'Alamat'));
echo bootstrap_form_input('agama', $pengguna['agama'], array('class' => 'span6', 'placeholder' => 'Agama', 'label' => 'Agama'));
echo bootstrap_form_input('asal_sekolah', $pengguna['asal_sekolah'], array('class' => 'span6', 'placeholder' => 'Asal Sekolah', 'label' => 'Asal Sekolah'));
echo bootstrap_form_input('kelas', $pengguna['kelas'], array('class' => 'span6', 'placeholder' => 'Kelas', 'label' => 'Kelas'));
echo bootstrap_form_dropdown('level', array($pengguna['level']), array('class' => 'span6', 'list' => array(Level::PAKAR => Level::PAKAR, Level::SISWA => Level::SISWA), 'label' => 'Jenis Pengguna' . bootstrap_text_important()));
echo bootstrap_form_password('password', NULL, array('class' => 'span6', 'placeholder' => 'Password', 'label' => 'Password'));
echo bootstrap_form_password('confirmation_password', NULL, array('class' => 'span6', 'placeholder' => 'Konfirmasi Password', 'label' => 'Konfirmasi Password'));
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Simpan', array('class' => 'btn btn-primary', 'after' => anchor('admin/pengguna', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>