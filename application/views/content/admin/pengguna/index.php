<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/pengguna/add', 'Pengguna Baru', 'class="btn  btn-primary btn-add"');
echo form_open('admin/pengguna/index', 'style="display:inline" method="get"');
?>
<div class="input-append pull-right">
  <input name="nama" class="span3" id="appendedInputButton" type="text" placeholder="Cari Berdasarkan Nama">
  <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Cari</button>
</div>
<?php
echo form_close();
echo bootstrap_tag_open('table', array('class' => 'table table-bordered table-striped table-hover bg-white'));
echo bootstrap_table_head(array('No.', 'Username', 'Nama', 'Tempat/Tanggal Lahir', 'Jenis Kelamin', 'Asal Sekolah', 'Kelas', 'Level', 'Aksi'));
echo bootstrap_tag_open('tbody');
$offset = (empty($offset)) ? 0 : $offset;
foreach ($pengguna['data'] as $key => $karakter) {
  $offset++;
  $actions = array(
    'view' => array('name' => 'Detail', 'action' => 'view/' . $karakter['id']),
    'edit' => array('name' => 'Edit', 'action' => 'edit/' . $karakter['id']),
    'delete' => array('name' => 'Delete', 'action' => 'delete/' . $karakter['id']),
  );
  echo bootstrap_table_tr(array($offset, $karakter['username'], $karakter['nama'], $karakter['tempat_lahir'] . ', ' . date_indo($karakter['tanggal_lahir']), $karakter['jenis_kelamin'], $karakter['asal_sekolah'], $karakter['kelas'], $karakter['level'], bootstrap_table_action_dropdown($class, $actions)), 'td');
}
echo bootstrap_tag_close('tbody');
echo bootstrap_tag_close('table');

echo $pagination;
?>