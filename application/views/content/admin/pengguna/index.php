<div class="page-header">
  <h1><?php echo $title;?></h1>
</div>
<?php
echo anchor('admin/pengguna/add', 'Pengguna Baru', 'class="btn  btn-primary btn-add"');

echo bootstrap_tag_open('table', array('class' => 'table table-bordered table-striped table-hover bg-white'));
echo bootstrap_table_head(array('No.', 'Username', 'Nama', 'Tempat/Tanggal Lahir', 'Jenis Kelamin', 'Asal Sekolah', 'Kelas', 'Level', 'Status', 'Aksi'));
echo bootstrap_tag_open('tbody');
$offset = (empty($offset)) ? 0 : $offset;
foreach ($pengguna['data'] as $key => $user) {
  $offset++;
  $actions = array(
    'view' => array('name' => 'Detail', 'action' => 'view/' . $user['id']),
    'edit' => array('name' => 'Edit', 'action' => 'edit/' . $user['id']),
    'delete' => array('name' => 'Delete', 'action' => 'delete/' . $user['id']),
  );
  echo bootstrap_table_tr(array($offset, $user['username'], $user['nama'], $user['tempat_lahir'] . ', ' . $user['tanggal_lahir'], $user['jenis_kelamin'], $user['asal_sekolah'], $user['kelas'], $user['level'], $user['status'], bootstrap_table_action_dropdown($class, $actions)), 'td');
}
echo bootstrap_tag_close('tbody');
echo bootstrap_tag_close('table');

echo $pagination;
?>