<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php echo anchor('/', 'LBB GenPI Education', 'class="brand"'); ?>
      <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><?php echo anchor('admin/halaman/about', '<i class="icon-leaf icon-white"></i> About'); ?></li>
          <?php if (in_array($user_login['level'], array(Level::ADMIN, Level::PAKAR))) { ?>
            <li><?php echo anchor('admin/karakter', '<i class="icon-eye-open icon-white"></i> Karakter'); ?></li>
            <li><?php echo anchor('admin/anjuran', '<i class="icon-comment icon-white"></i> Anjuran'); ?></li>
            <li><?php echo anchor('admin/pertanyaan', '<i class="icon-list icon-white"></i> Pertanyaan'); ?></li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-th-large icon-white"></i> Konsultasi</a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('admin/konsultasi', '<i class="icon-align-justify"></i> Riwayat Konsultasi'); ?></li>
                <li class="dropdown-submenu">
                  <a tabindex="-1" href="#"><i class="icon-calendar"></i> Laporan Konsultasi</a>
                  <ul class="dropdown-menu">
                    <?php
                    foreach ($menu_karakter as $k_menu) {
                      echo '<li>' . anchor('admin/konsultasi/laporan/' . $k_menu['id'], '<i class="icon-align-center"></i> Laporan ' . ucwords($k_menu['nama_karakter'])) . '</li>';
                    }
                    for ($i = 0; $i < count($menu_karakter); $i++) {
                      if (isset($menu_karakter[$i + 1])) {
                        echo '<li>' . anchor('admin/konsultasi/laporan/' . implode('-', array($menu_karakter[$i]['id'], $menu_karakter[$i + 1]['id'])), '<i class="icon-align-center"></i> Laporan ' . ucwords(implode(' - ', array($menu_karakter[$i]['nama_karakter'], $menu_karakter[$i + 1]['nama_karakter'])))) . '</li>';
                      }
                      if ($i == (count($menu_karakter) - 1)) {
                        echo '<li>' . anchor('admin/konsultasi/laporan/' . implode('-', array($menu_karakter[0]['id'], $menu_karakter[$i]['id'])), '<i class="icon-align-center"></i> Laporan ' . ucwords(implode(' - ', array($menu_karakter[0]['nama_karakter'], $menu_karakter[$i]['nama_karakter'])))) . '</li>';
                      }
                    }
                    ?>
                  </ul>
                </li>
               <?php if ($user_login['level'] == Level::ADMIN) { ?>
                  <li class="divider"></li>
                  <li><?php echo anchor('admin/pertanyaan/konsultasi', '<i class="icon-file"></i> Konsultasi'); ?></li>
                  <li><?php echo anchor('admin/konsultasi/hasil', '<i class="icon-list-alt"></i> Hasil Konsultasi'); ?></li>
               <?php } ?>
              </ul>
            </li>
              <?php
            }
            if ($user_login['level'] == Level::ADMIN) {
              ?>
            <li><?php echo anchor('admin/pengguna', '<i class="icon-user"></i> Pengguna'); ?></li>
            <?php
          }
          if ($user_login['level'] == Level::SISWA) {
            ?>
            <li><?php echo anchor('admin/pertanyaan/konsultasi', '<i class="icon-file icon-white"></i> Konsultasi'); ?></li>
            <li><?php echo anchor('admin/konsultasi/hasil', '<i class="icon-list-alt icon-white"></i> Hasil Konsultasi'); ?></li>
<?php } ?>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-lock icon-white"></i> <?php echo $user_login['nama']; ?> <strong class="caret"></strong></a>
            <ul class="dropdown-menu">
              <li><?php echo anchor('admin/pengguna/edit_account', '<i class="icon-retweet"></i> Ganti Profile'); ?></li>
              <li><?php echo anchor('admin/pengguna/change_password', '<i class="icon-random"></i> Ganti Kata Sandi'); ?></li>
              <li class="divider"></li>
              <li><?php echo anchor('logout', '<i class="icon-share-alt"></i> Keluar'); ?></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>