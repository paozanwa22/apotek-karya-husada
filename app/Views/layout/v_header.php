<nav class="navbar navbar-expand-lg main-navbar sidebar-collapse">
  <div class="mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </div>

  <!-- Notifikasi untuk menghitung jumlah obat kadaluwarsa -->
  <?php
  $db = \Config\Database::connect();

  $query = $db->query("SELECT kd_obat, tgl_kadaluarsa, stok FROM tb_obat");

  $data = $query->getResultArray();

  $jmlhmkdl = 0;
  $tglkdl = 0;
  $jmlobt = 0;
  foreach ($data as $d) {
    $kadaluwarsa = $d['tgl_kadaluarsa'];
    $pengurangan = date('Y-m-d', strtotime('-1 MONTH', strtotime($kadaluwarsa)));

    if (date('Y-m-d', time() + (60 * 60 * 13)) >= $pengurangan && date('Y-m-d', time() + (60 * 60 * 13)) <= $d['tgl_kadaluarsa']) {
      $jmlhmkdl++;
    } else if (date('Y-m-d', time() + (60 * 60 * 13)) >= $d['tgl_kadaluarsa']) {
      $tglkdl++;
    }
    if ($d['stok'] == "0") {
      $jmlobt++;
    }
  }
  $total = 0;
  $total = $jmlhmkdl + $tglkdl;
  // echo $total;

  ?>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle">
      <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if ($total != 0) {
                                                                                            echo "beep";
                                                                                          } ?>"><i class="far fa-bell online"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Informasi
        </div>
        <div class="dropdown-list-icons">
          <a href="<?= base_url('/admin/dkadaluwarsa'); ?>" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="fa fa-pills fa-lg"></i>
            </div>
            <div class="dropdown-item-desc">
              <b><?= $tglkdl; ?> Obat Sudah Kadaluwarsa</b>
              <div class="time text-success">Klik untuk melihat</div>
            </div>
          </a>
        </div>

        <div class="dropdown-list-icons">
          <a href="<?= base_url('/admin/dakankadaluwarsa'); ?>" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="fa fa-pills fa-lg"></i>
            </div>
            <div class="dropdown-item-desc">
              <b><?= $jmlhmkdl; ?> Obat Akan Masuk Kadaluwarsa</b>
              <div class="time text-success">Klik untuk melihat</div>
            </div>
          </a>
        </div>

        <div class="dropdown-list-icons">
          <a href="<?= base_url('/admin/obthabis'); ?>" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="fa fa-exclamation-circle fa-lg"></i>
            </div>
            <div class="dropdown-item-desc">
              <b><?= $jmlobt; ?> Obat Habis</b>
              <div class="time text-success">Klik untuk melihat</div>
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
    // dd($data);
    ?>

    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?= base_url('/gambar/' . $data->poto) ?>" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block"><?= session()->get('level'); ?>, <?= $data->nama; ?></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <?php if (session()->get('level') == "Admin") { ?>

          <a href="<?= base_url('admin/profile'); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="<?= base_url('/admin/gantiPass'); ?>" class="dropdown-item has-icon">
            <i class="fas fa-key"></i> Ganti Kata Sandi
          </a>
          <a href="<?= base_url('admin/profile_aptk'); ?>" class="dropdown-item has-icon">
            <i class="fas fa-user"></i> Profile Apotek
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('/login/logout'); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>

        <?php } elseif (session()->get('level') == "Apoteker") { ?>

          <a href="<?= base_url('/Pengguna/profilepengguna'); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="<?= base_url('admin/gantiPass'); ?>" class="dropdown-item has-icon">
            <i class="fas fa-key"></i> Ganti Kata Sandi
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('/login/logout'); ?>" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>

        <?php } elseif (session()->get('level') == "Pimpinan") { ?>

          <a href="<?= base_url('admin/profile'); ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="<?= base_url('/admin/gantiPass'); ?>" class="dropdown-item has-icon">
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