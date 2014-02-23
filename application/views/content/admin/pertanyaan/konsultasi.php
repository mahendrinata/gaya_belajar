<?php if ($konsultasi > 0) { ?>
  <section>
    <div class="hero-unit">
      <h1>Maaf, anda sudah melakukan konsultasi</h1>
      <p>Silahkan lihat hasil konsultasi dengan melakukan klik pada tombol di bawah ini.</p>
      <p>
        <?php
        echo anchor('admin/konsultasi/hasil', 'Hasil Konsultasi', 'class="btn btn-primary btn-large"');
        echo '&nbsp;';
        echo anchor('admin/konsultasi/reset', 'Ulangi Konsultasi', 'class="btn btn-primary btn-large"');
        ?>
      </p>
    </div>
  </section>
<?php } else { ?>
  <div class="page-header">
    <h1><?php echo $title; ?></h1>
  </div>
  <?php
  echo form_open('admin/konsultasi/jawaban', 'class="row"');
  $i = 0;
  foreach ($pertanyaan as $tanya) {
    $i++;
    if (($i - 1) % 3 == 0 && $i != 1) {
      echo '<div class="clearfix"></div><hr>';
    }
    ?>
    <div class="control-group span4">
      <div class="controls">
        <?php echo $i . '. ' . $tanya['pertanyaan']; ?>
        <ul id="jawaban" style="list-style: none;">
          <?php foreach ($tanya['jawaban'] as $jawaban) { ?>
          <li><label class="radio"><input required="require" type="radio" name="<?php echo $tanya['id']; ?>" value="<?php echo $jawaban['id']; ?>"> <?php echo $jawaban['jawaban']; ?></label></li>
          <?php } ?>
        </ul>
      </div>
    </div>

  <?php } ?>
  <div class="clearfix"></div>
  <hr>
  <div class="control-group">
    <div class="controls">
      <input type="submit" class="btn btn-primary" value="Simpan Jawaban"/>
    </div>
  </div>

  </form>
<?php } ?>

