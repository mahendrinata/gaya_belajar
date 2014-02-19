<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<table class="table table-bordered table-striped table-hover bg-white">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <th>Karakter</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $nama = NULL;
    $offset = (empty($offset)) ? 0 : $offset;
    foreach ($konsultasi as $konsul) {
      $offset++;
      $n = ($konsul['nama'] == $nama) ? NULL : $konsul['nama'];
      echo '<tr>';
      echo '<td>' . $offset . '</td>';
      echo '<td>' . $n . '</td>';
      echo '<td>' . $konsul['nama_karakter'] . '</td>';
      echo '<td>' . $konsul['jumlah'] . '</td>';
      echo '</tr>';
      $nama = $konsul['nama'];
    }
    ?>
  </tbody>
</table>