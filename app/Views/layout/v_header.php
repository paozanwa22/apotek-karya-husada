<nav class="navbar navbar-expand-lg main-navbar sidebar-collapse">
        <div class="mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifikasi
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
              </div>
            </div>
          </li>

          <!-- Kode untuk menampilkan poto pada header berdasarkan user login -->
          <?php
            $db = \Config\Database::connect();
            $id_pengguna = session()->get('id_pengguna');
            $cari = $db->query("SELECT * FROM tb_pengguna WHERE id_pengguna = $id_pengguna");
            $data = $cari->getRow();
          ?>

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('/gambar/'.$data->poto) ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= session()->get('level'); ?>, <?= $data->nama; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <?php if(session()->get('level') == "Admin"){ ?>

              <a href="<?= base_url('admin/profile'); ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= base_url('login/gantiPass'); ?>" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Ganti Kata Sandi
              </a>
              <a href="<?= base_url('admin/profile_aptk'); ?>" class="dropdown-item has-icon">
                <i class="fas fa-user"></i> Profile Apotek
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('/login/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
              
              <?php }elseif(session()->get('level') == "Apoteker"){ ?>

              <a href="<?= base_url('/Pengguna/profilepengguna'); ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= base_url('login/gantiPass'); ?>" class="dropdown-item has-icon">
                <i class="fas fa-key"></i> Ganti Kata Sandi
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('/login/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>

              <?php }elseif(session()->get('level') == "Pimpinan"){ ?>

              <a href="<?= base_url('admin/profile'); ?>" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= base_url('login/gantiPass'); ?>" class="dropdown-item has-icon">
              <i class="fas fa-key"></i> Ganti Kata Sandi
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('/login/logout'); ?>" class="dropdown-item has-icon text-danger">
              <i class="fas fa-sign-out-alt"></i> Keluar
              </a>

              <?php } ?>
            </div>
          </li>
        </ul>
      </nav>