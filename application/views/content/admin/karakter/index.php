<div class="page-header">
  <h1><?php echo $title;?></h1>
</div>
<?php
echo anchor('admin/karakter/add', 'Karakter Baru', 'class="btn  btn-primary btn-add"');

echo bootstrap_tag_open('table', array('class' => 'table table-bordered table-striped table-hover bg-white'));
echo bootstrap_table_head(array('No.', 'Nama', 'Keterangan', 'Aksi'));
echo bootstrap_tag_open('tbody');
$offset = (empty($offset)) ? 0 : $offset;
foreach ($karakter['data'] as $key => $karakter) {
  $offset++;
  $actions = array(
    'view' => array('name' => 'Detail', 'action' => 'view/' . $karakter['id']),
    'edit' => array('name' => 'Edit', 'action' => 'edit/' . $karakter['id']),
    'delete' => array('name' => 'Delete', 'action' => 'delete/' . $karakter['id']),
  );
  echo bootstrap_table_tr(array($offset, $karakter['nama_karakter'], $karakter['keterangan'], bootstrap_table_action_dropdown($class, $actions)), 'td');
}
echo bootstrap_tag_close('tbody');
echo bootstrap_tag_close('table');

echo $pagination;
?>