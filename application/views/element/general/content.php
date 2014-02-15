<div class="container">
  <section>
    <div class="row">
      <div class="span12">
        <?php
        $file_view = 'content/' . $directory . '/' . $class . '/' . $method;
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