<?php if (!isset($konsultasi['data']) || empty($konsultasi['data'])) { ?>
  <section>
    <div class="hero-unit">
      <h1>Maaf, anda belum melakukan konsultasi</h1>
      <p>Silahkan melakukan konsultasi konsultasi dengan melakukan klik pada tombol di bawah ini.</p>
      <p>
        <?php
        echo anchor('admin/pertanyaan/konsultasi', 'Konsultasi', 'class="btn btn-primary btn-large"');
        ?>
      </p>
    </div>
  </section>
<?php } else { ?>
  <section>
    <div class="hero-unit">
      <h1>Hasil Konsultasi</h1>
      <p>Tanggal Konsultasi : <?php echo date('d F Y', strtotime($konsultasi['tanggal'])); ?></p>
    </div>
  </section>

  <div class="well">
    <table class="table" style="margin: 0px auto; max-width: 600px;">
      <tr>
        <th>Nama</th>
        <td><?php echo $pengguna['nama']; ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td><?php echo $pengguna['jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <th>Tempat, Tanggal Lahir</th>
        <td><?php echo $pengguna['tempat_lahir'] . ', ' . date('d F Y', strtotime($pengguna['tanggal_lahir'])); ?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td><?php echo $pengguna['alamat']; ?></td>
      </tr>
      <tr>
        <th>Agama</th>
        <td><?php echo $pengguna['agama']; ?></td>
      </tr>
      <tr>
        <th>Sekolah</th>
        <td><?php echo $pengguna['asal_sekolah']; ?></td>
      </tr>
      <tr>
        <th>Kelas</th>
        <td><?php echo $pengguna['kelas']; ?></td>
      </tr>
    </table>
  </div>

  <div class="well text-center">
    <h3>Gaya Belajar Anda Adalah:</h3>
    <h2><?php echo $karakter['nama_karakter']; ?></h2>
  </div>

  <div class="well text-center">
    <h3>Anjuran</h3>
      <?php foreach ($karakter['anjuran'] as $anjuran) { ?>
        <p><?php echo $anjuran['anjuran']; ?></p>
      <?php } ?>
  </div>

  <div class="well text-center">
    <h2>Presentase Kecenderungan Gaya Belajar:</h2>
    <?php foreach ($konsultasi['data'] as $konsul) { ?>
      <h4><?php echo $konsul['nama_karakter'] . ' : ' . round($konsul['jumlah'] / $konsultasi['total'] * 100) . ' %'; ?></h4>
    <?php } ?>
  </div>

  <div class="well text-center">
    <?php
    echo anchor('admin/konsultasi/reset', 'Ulangi', 'class="btn btn-primary btn-large"');
    echo '&nbsp;';
    echo anchor('admin/konsultasi/print_hasil', 'Cetak', 'class="btn btn-primary btn-large" target="_blank"');
    ?>
  </div>
<?php } ?>