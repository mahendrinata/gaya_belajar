<div class="page-header">
  <h1><?php echo $title;?></h1>
</div>
<?php
echo anchor('admin/anjuran/add', 'Anjuran Baru', 'class="btn  btn-primary btn-add"');
echo form_open('admin/anjuran/index', 'style="display:inline" method="get"');
?>
<div class="input-append pull-right">
  <input name="nama" class="span3" id="appendedInputButton" type="text" placeholder="Cari Berdasarkan Karakter">
  <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Cari</button>
</div>
<?php
echo form_close();

echo bootstrap_tag_open('table', array('class' => 'table table-bordered table-striped table-hover bg-white'));
echo bootstrap_table_head(array('No.', 'Karakter', 'Anjuran', 'Aksi'));
echo bootstrap_tag_open('tbody');
$offset = (empty($offset)) ? 0 : $offset;
foreach ($anjuran['data'] as $key => $anjuran) {
  $offset++;
  $actions = array(
    'view' => array('name' => 'Detail', 'action' => 'view/' . $anjuran['id']),
    'edit' => array('name' => 'Edit', 'action' => 'edit/' . $anjuran['id']),
    'delete' => array('name' => 'Delete', 'action' => 'delete/' . $anjuran['id']),
  );
  echo bootstrap_table_tr(array($offset, $anjuran['karakter']['nama_karakter'], $anjuran['anjuran'], bootstrap_table_action_dropdown($class, $actions)), 'td');
}
echo bootstrap_tag_close('tbody');
echo bootstrap_tag_close('table');

echo $pagination;
?>