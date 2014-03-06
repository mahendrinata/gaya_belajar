<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hasil Konsultasi</title>
    <?php echo link_tag('assets/favicon.png', 'shortcut icon', 'image/ico'); ?>
    <style type="text/css">
      a, form, .print-hidden{
        display: none !important;
      }
      .content-print{
        /*border: 3px dashed #000000;*/
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
      table{
        margin-bottom: 20px;
        width: 100%;
      }
      .header-print{
        width: 100%;
        border-bottom: #000 double 6px;
        margin: 10px;
        margin-bottom: 20px;
      }
      .logo{
        width: 20%;
        float: left;
      }
      .head-content{
        float: left;
        width: 80%;
        text-align: center;
      }
      .logo img{
        float: left;
        height: 125px;
      }
    </style>
    <?php echo css(array('font-awesome.min')); ?>
  </head>
  <body onload="window.print()">
    <div class="header-print">
      <div class="logo">
        <?php echo img('assets/img/genpi-logo.jpg');?>
        <div style="clear: both"></div>
      </div>
      <div class="head-content">
        <h2>LEMBAGA BIMBINGAN BELAJAR</h2>
        <h2>GENPI EDUCATION MERAUKE</h2>
        <p>Pendidikan No. 3 Merauke - Hp: 085796157812</p>
      </div>
      <div style="clear: both"></div>
    </div>
    <div class="content-print">
      <?php $this->load->view('element/general/content'); ?>
    </div>
  </body>
</html>
