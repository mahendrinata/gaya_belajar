<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php
echo anchor('admin/konsultasi/print_index' . $suffix, 'Cetak Riwayat Konsultasi', 'target="_blank" class="btn  btn-primary btn-add"');
echo form_open('admin/konsultasi/index', 'style="display:inline" method="get" class="form-inline pull-right"');
?>
<!--<input name="nama" class="span3" type="text" placeholder="Cari Berdasarkan Gaya Belajar">-->
<input name="tanggal" class="span2 datepicker" type="text" placeholder="Tanggal">
<button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i> Cari</button>
<?php
echo form_close();
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
      <th rowspan="2" style="text-align: center;vertical-align: middle" class="print-hidden">Aksi</th>
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
      $actions = array(
        'view' => array('name' => 'Detail', 'action' => 'hasil/' . $konsul['id']),
      );
      echo '<td class="print-hidden">' . anchor('admin/konsultasi/hasil/'.$konsul['id'] , 'Detail', 'class="btn  btn-primary btn-add"') . '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php echo $pagination; ?>