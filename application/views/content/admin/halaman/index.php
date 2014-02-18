<section>
  <div class="hero-unit">
    <h1>Selamat Datang</h1>
    <p>Aplikasi Tes Gaya Belajar.</p>
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