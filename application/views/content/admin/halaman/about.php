<section>
  <div class="hero-unit">
    <h3>Aplikasi Penentuan Gaya Belajar</h3>
    <p>
      Aplikasi ini dapat menentukan gaya belajar siswa.
      Aplikasi dikategorikan sebagai sistem pakar, 
      karena aplikasi dapat menggantikan peran seorang ahli, 
      yaitu menganalisa jawaban pertanyaan yang merupakan karakter-karakter seseorang atau siswa dan memberikan sebuah kesimpulan tentang 
      gaya belajar yang dimiliki oleh siswa tersebut
    </p>
    <h3>Jenis Gaya Bejar</h3>
    <?php
    foreach ($karakter as $k) {
      echo '<h4>' . $k['nama_karakter'] . '</h4>';
      echo '<p>' . $k['keterangan'] . '</p>';
    }
    ?>
    <?php
    echo anchor('admin/pertanyaan/konsultasi', 'Konsultasi', 'class="btn btn-primary btn-large"');
    ?>
  </div>
</section>