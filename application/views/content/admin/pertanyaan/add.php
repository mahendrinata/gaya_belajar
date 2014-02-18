<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo form_open('admin/pertanyaan/add', array('class' => 'form-horizontal'));
echo bootstrap_form_textarea('pertanyaan', NULL, array('class' => 'span8', 'placeholder' => 'Pertanyaan', 'rows' => 6, 'label' => 'Pertanyaan' . bootstrap_text_important()));
?>
<div class="control-group">
  <label for="jawaban" class="control-label">Jawaban<span class="text-error"> *</span></label>
  <div class="controls">
    <ul id="jawaban" style="margin-top: 10px">
      <?php foreach ($karakter as $k_karakter => $v_karakter) { ?>
        <li>
          <?php
          echo form_input('jawaban[' . $k_karakter . '][jawaban]', NULL, 'placeholder="Jawaban" class="span4"');
          echo form_dropdown('jawaban[' . $k_karakter . '][karakter_id]', $karakter, array(), 'class="span4"');
          echo '<br><br>';
          ?>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>
<?php
echo bootstrap_control_group(NULL, bootstrap_text_important('Catatan : Jika terdapat tanda asterisk/bintang (*) maka field harus diisi.'));
echo bootstrap_form_submit(NULL, 'Simpan', array('class' => 'btn btn-primary', 'after' => anchor('admin/pertanyaan', 'Kembali', 'class="btn btn-danger btn-link-bootstrap"')));
echo form_close();
?>
