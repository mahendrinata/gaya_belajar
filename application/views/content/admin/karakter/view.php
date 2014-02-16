<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
$data = array(
  array('label' => 'Nama Karakter', 'value' => $karakter['nama_karakter']),
  array('label' => 'Keterangan', 'value' => $karakter['keterangan']),
);
echo bootstrap_table_view($data);

echo anchor('admin/karakter', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"');
echo bootstrap_tag_close('div');
?>