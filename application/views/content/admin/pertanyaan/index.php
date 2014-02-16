<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/pertanyaan/add', 'Pertanyaan Baru', 'class="btn  btn-primary btn-add"');

echo bootstrap_tag_open('table', array('class' => 'table table-bordered table-striped table-hover bg-white'));
echo bootstrap_table_head(array('No.', 'Pertanyaan', 'Jawaban', 'Aksi'));
echo bootstrap_tag_open('tbody');
$offset = (empty($offset)) ? 0 : $offset;
foreach ($pertanyaan['data'] as $key => $pertanyaan) {
  $offset++;
  $actions = array(
    'view' => array('name' => 'Detail', 'action' => 'view/' . $pertanyaan['id']),
    'edit' => array('name' => 'Edit', 'action' => 'edit/' . $pertanyaan['id']),
    'delete' => array('name' => 'Delete', 'action' => 'delete/' . $pertanyaan['id']),
  );
  $string_jawaban = '';
  if ($pertanyaan['jawaban']) {
    $string_jawaban = '<ul>';
    foreach ($pertanyaan['jawaban'] as $jawaban) {
      $string_jawaban .= '<li>' . $jawaban['jawaban'] . ' (' . $karakter[$jawaban['karakter_id']] . ')</li>';
    }
    $string_jawaban .= '</ul>';
  }
  echo bootstrap_table_tr(array($offset, $pertanyaan['pertanyaan'], $string_jawaban, bootstrap_table_action_dropdown($class, $actions)), 'td');
}
echo bootstrap_tag_close('tbody');
echo bootstrap_tag_close('table');

echo $pagination;
?>