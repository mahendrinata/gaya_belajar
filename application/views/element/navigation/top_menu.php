<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php echo anchor('/', 'Gaya Belajar', 'class="brand"'); ?>
      <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <?php if (in_array($user_login['level'], array(Level::ADMIN, Level::PAKAR))) { ?>
            <li><?php echo anchor('admin/karakter', 'Karakter'); ?></li>
            <li><?php echo anchor('admin/anjuran', 'Anjuran'); ?></li>
            <li><?php echo anchor('admin/pertanyaan', 'Pertanyaan'); ?></li>
            <li><?php echo anchor('admin/konsultasi', 'Riwayat Konsultasi'); ?></li>
            <?php
          }
          if ($user_login['level'] == Level::ADMIN) {
            ?>
            <li><?php echo anchor('admin/pengguna', 'Pengguna'); ?></li>
            <?php
          }
          if ($user_login['level'] == Level::SISWA) {
            ?>
            <li><?php echo anchor('admin/pertanyaan/konsultasi', 'Konsultasi'); ?></li>
            <li><?php echo anchor('admin/konsultasi/hasil', 'Hasil Konsultasi'); ?></li>
          <?php } ?>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-lock icon-white"></i> <?php echo $user_login['nama']; ?> <strong class="caret"></strong></a>
            <ul class="dropdown-menu">
              <li><?php echo anchor('admin/pengguna/edit_account', 'Ganti Profile'); ?></li>
              <li><?php echo anchor('admin/pengguna/change_password', 'Ganti Kata Sandi'); ?></li>
              <li class="divider"></li>
              <li><?php echo anchor('logout', 'Keluar'); ?></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>