<div class="container">
  <?php echo bootstrap_alert($this->session->flashdata('message'), 'center'); ?>
  <div class="clearfix"></div>
  <section>
    <div class="row">
      <div class="span12">
        <?php
        $file_view = (!isset($layout) || empty($layout)) ? 'content/' . $directory . '/' . $class . '/' . $method : $layout;
        if (file_exists(APPPATH . 'views/' . strtolower($file_view) . '.php')) {
          $this->load->view($file_view);
        } else {
          $this->load->view('error/404');
        }
        ?>
      </div>
    </div>
  </section>
</div>