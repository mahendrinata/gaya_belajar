<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
$data = array(
  array('label' => 'Username', 'value' => $pengguna['username']),
  array('label' => 'Nama Lengkap', 'value' => $pengguna['nama']),
  array('label' => 'Tempat/Tanggal Lahir', 'value' => $pengguna['tempat_lahir'] . ', ' . date('d F Y', strtotime($pengguna['tanggal_lahir']))),
  array('label' => 'Jenis Kelamin', 'value' => $pengguna['jenis_kelamin']),
  array('label' => 'Alamat', 'value' => $pengguna['alamat']),
  array('label' => 'Agama', 'value' => $pengguna['agama']),
  array('label' => 'Asal Sekolah', 'value' => $pengguna['asal_sekolah']),
  array('label' => 'Kelas', 'value' => $pengguna['kelas']),
  array('label' => 'Level', 'value' => $pengguna['level']),
);
echo bootstrap_table_view($data);

echo anchor('admin/pengguna', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"');
echo bootstrap_tag_close('div');
?>