<section>
  <div class="hero-unit">
    <?php echo img('assets/img/genpi-logo.jpg');?>
    <h1>Selamat Datang</h1>
    <h3>Lembaga Bimbingan Belajar</h3>
    <h3>GenPI Education Merauke</h3>
    <p>
      <?php
      if ($user_login['level'] == Level::SISWA) {
        echo anchor('admin/konsultasi/hasil', 'Hasil Konsultasi', 'class="btn btn-primary btn-large"');
      } else {
        echo anchor('admin/konsultasi', 'Riwayat Konsultasi', 'class="btn btn-primary btn-large"');
      }
      ?>
    </p>
  </div>
</section>