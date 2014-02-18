<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
$string_jawaban = '';
if ($pertanyaan['jawaban']) {
  $string_jawaban = '<ul>';
  foreach ($pertanyaan['jawaban'] as $jawaban) {
    $string_jawaban .= '<li>' . $jawaban['jawaban'] . ' (' . $karakter[$jawaban['karakter_id']] . ')</li>';
  }
  $string_jawaban .= '</ul>';
}

$data = array(
  array('label' => 'Pertanyaan', 'value' => $pertanyaan['pertanyaan']),
  array('label' => 'Jawaban', 'value' => $string_jawaban),
);
echo bootstrap_table_view($data);

echo anchor('admin/pertanyaan', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"');
echo bootstrap_tag_close('div');
?>