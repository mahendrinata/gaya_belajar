<section>
  <div class="hero-unit">
    <h1>Hasil Konsultasi</h1>
    <p>Tanggal Konsultasi : <?php echo $konsultasi['tanggal']; ?></p>
  </div>
</section>

<div class="well">
  <table class="table" style="margin: 0px auto; max-width: 600px;">
    <tr>
      <th>Nama</th>
      <td><?php echo $pengguna['nama']; ?></td>
    </tr>
    <tr>
      <th>Tempat, Tanggal Lahir</th>
      <td><?php echo $pengguna['tempat_lahir'] . ', ' . $pengguna['tanggal_lahir']; ?></td>
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
    <h4><?php echo $anjuran['anjuran']; ?></h4>
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
  ?>
</div>
