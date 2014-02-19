<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<table class="table table-bordered table-striped table-hover bg-white">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama</th>
      <?php
      foreach ($karakter as $k) {
        echo '<th>' . $k['nama_karakter'] . '</th>';
      }
      ?>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $offset = (empty($offset)) ? 0 : $offset;
    foreach ($konsultasi as $konsul) {
      $offset++;
      echo '<tr>';
      echo '<td>' . $offset . '</td>';
      echo '<td>' . $konsul['nama'] . '</td>';
      foreach ($karakter as $k) {
        $count = $konsul[url_title($k['nama_karakter'], '_', TRUE)];
        echo '<td>' . $count . '</td>';
      }
      echo '<td>' . $konsul['jumlah'] . '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>

<?php echo $pagination; ?>