<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
$data = array(
  array('label' => 'karakter', 'value' => $anjuran['karakter']['nama_karakter']),
  array('label' => 'Anjuran', 'value' => $anjuran['anjuran']),
);
echo bootstrap_table_view($data);

echo anchor('admin/anjuran', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"');
echo bootstrap_tag_close('div');
?>