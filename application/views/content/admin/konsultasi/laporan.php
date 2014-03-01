<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/konsultasi/print_laporan/' . implode('-', $id), 'Cetak Laporan ' . implode(' - ', $nama), 'target="_blank" class="btn  btn-primary btn-add"');
?>
<table class="table table-bordered table-striped table-hover bg-white print-border">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Alamat</th>
      <th>Asal Sekolah</th>
      <th>Kelas</th>
      <th>Gaya Belajar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $offset = 0;
    foreach ($konsultasi as $konsul) {
      $offset++;
      echo '<tr>';
      echo '<td>' . $offset . '</td>';
      echo '<td>' . $konsul['nama'] . '</td>';
      echo '<td>' . $konsul['tempat_lahir'] . ', ' . date_indo($konsul['tanggal_lahir']) . '</td>';
      echo '<td>' . $konsul['jenis_kelamin'] . '</td>';
      echo '<td>' . $konsul['agama'] . '</td>';
      echo '<td>' . $konsul['alamat'] . '</td>';
      echo '<td>' . $konsul['asal_sekolah'] . '</td>';
      echo '<td>' . $konsul['kelas'] . '</td>';
      echo '<td>' . implode(' - ', $nama) . '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>