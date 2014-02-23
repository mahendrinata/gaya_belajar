<?php echo bootstrap_alert($this->session->flashdata('message'), 'center'); ?>

<div class="container">
  <div class="header-login">
    <?php echo img('assets/img/genpi-logo.jpg'); ?>
    <h2 class="form-signin-heading">Lembaga Bimbingan Belajar GenPI Education Merauke</h2>
  </div>
</div>
<div class="container">

  <?php echo form_open('login', array('class' => 'form-signin')) ?>
  <h5 class="form-signin-heading">Masukkan Username dan Password untuk masuk ke Aplikasi</h5>
  <?php echo label_error('username', '<label class="label label-important">', '</label>'); ?>
  <?php echo form_input('username', set_value('username'), 'placeholder="Username" class="input-block-level"'); ?>
  <?php echo label_error('password', '<label class="label label-important">', '</label>'); ?>
  <?php echo form_password('password', set_value('password'), 'placeholder="Password" class="input-block-level"'); ?>
  <?php echo form_submit('login', 'Login', 'class="btn btn-large btn-primary"'); ?>
  <?php echo anchor('register', 'Daftar', 'class="btn btn-large btn-success"');?>
  <?php echo form_close(); ?>

</div>
