<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gaya Belajar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <?php echo js(array('html5')); ?>
    <![endif]-->
    <?php
    echo css(array(
      'bootstrap.min',
      'bootstrap-responsive.min',
      'font-awesome.min',
      'bootswatch'
    ));

    echo js(array(
      'jquery.min',
      'bootstrap.min',
      'bootswatch'
    ));
    ?>
  </head>
  <body>
    <?php
    $this->load->view('element/navigation/top_menu');
    $this->load->view('element/general/content')
    ?>
  </body>
</html>
