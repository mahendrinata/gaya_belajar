<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hasil Konsultasi</title>
    <style type="text/css">
      a{
        display: none;
      }
      .content-print{
        border: 1px solid #000000;
        max-width: 750px;
        padding: 10px;
        text-align: center;
        margin: 10px auto;
      }
      table th, table td {
        text-align: left;
      }
      .well{
        margin-top: 35px;
      }
    </style>
  </head>
  <body onload="window.print()">
    <div class="content-print">
      <?php $this->load->view('element/general/content'); ?>
    </div>
  </body>
</html>
