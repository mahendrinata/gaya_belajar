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
        border: 3px dashed #000000;
        max-width: 750px;
        padding: 10px;
        text-align: center;
        margin: 10px auto;
        min-height: 900px;
      }
      table th, table td {
        text-align: left;
        padding: 5px 15px;
      }
      .well{
        margin-top: 35px;
      }
      h1{
        font-size: 36px;
      }
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Telex',sans-serif;
        font-weight: bold;
        line-height: 20px;
        text-rendering: optimizelegibility;
      }
      .print-border, .print-border th, .print-border td{
        border: 1px solid #000;
        border-collapse: collapse;
      }
    </style>
    <?php echo css(array('font-awesome.min')); ?>
  </head>
  <body onload="window.print()">
    <div class="content-print">
      <?php $this->load->view('element/general/content'); ?>
    </div>
  </body>
</html>
