<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/konsultasi/print_laporan/' . implode('-', $id), 'Cetak Laporan ' . implode(' - ', $nama), 'target="_blank" class="btn  btn-primary btn-add"');
$offset = 0;
$kelas = NULL;
foreach ($konsultasi as $konsul) {
  if ($kelas != $konsul['kelas'] || $offset == 0) {
    ?>
    <table class="table table-bordered table-striped table-hover bg-white print-border">
      <thead>
        <tr>
          <th width="3%">No.</th>
          <th width="15%">Nama</th>
          <th width="20%">Tempat, Tanggal Lahir</th>
          <th width="8%">Jenis Kelamin</th>
          <th width="5%">Agama</th>
          <th width="18%">Alamat</th>
          <th width="15%">Asal Sekolah</th>
          <th width="8%">Kelas</th>
          <th>Gaya Belajar</th>
        </tr>
      </thead>
      <tbody>
        <?php
      }

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
      if (($kelas != $konsul['kelas'] && $offset > 1) || $offset == (count($konsultasi) + 1)) {
        ?>
      </tbody>
    </table>
    <?php
  }
  $kelas = $konsul['kelas'];
}
?>
