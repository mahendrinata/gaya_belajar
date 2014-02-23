<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/konsultasi/print_index', 'Cetak Riwayat Konsultasi', 'target="_blank" class="btn  btn-primary btn-add"');
?>
<table class="table table-bordered table-striped table-hover bg-white print-border">
  <thead>
    <tr>
      <th rowspan="2" style="text-align: center;vertical-align: middle">No.</th>
      <th rowspan="2" style="text-align: center;vertical-align: middle">Tanggal Konsultasi</th>
      <th rowspan="2" style="text-align: center;vertical-align: middle">Nama</th>
      <th rowspan="2" style="text-align: center;vertical-align: middle">Gaya Belajar</th>
      <th colspan="<?php echo count($karakter); ?>" style="text-align: center;vertical-align: middle">Presentase Kecenderungan Gaya Belajar</th>
      <th rowspan="2" style="text-align: center;vertical-align: middle">Jumlah</th>
    </tr>
    <tr>
      <?php
      foreach ($karakter as $k) {
        echo '<th style="text-align: center;vertical-align: middle">' . $k['nama_karakter'] . '</th>';
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $offset = (empty($offset)) ? 0 : $offset;
    foreach ($konsultasi as $konsul) {
      $max = array();
      foreach ($karakter as $k) {
        $max[] = $konsul[url_title($k['nama_karakter'], '_', TRUE)];
      }
      $for_max = max($max);
      $karakter_value = array();
      foreach ($karakter as $k) {
        if ($konsul[url_title($k['nama_karakter'], '_', TRUE)] >= $for_max) {
          $karakter_value[] = $k['nama_karakter'];
        }
      }
      $offset++;
      echo '<tr>';
      echo '<td>' . $offset . '</td>';
      echo '<td>' . date_indo($konsul['tanggal']) . '</td>';
      echo '<td>' . $konsul['nama'] . '</td>';
      echo '<td style="text-align: center;"><strong>' . implode(', ', $karakter_value) . '</strong></td>';
      foreach ($karakter as $k) {
        $count = $konsul[url_title($k['nama_karakter'], '_', TRUE)];
        echo '<td style="text-align: right;">' . round($count * 100 / $konsul['jumlah']) . '%</td>';
      }
      echo '<td style="text-align: right;">' . round($konsul['jumlah'] * 100 / $konsul['jumlah']) . '%</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php echo $pagination; ?>