<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Apotek Karya Husada</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">APT</a>
    </div>
    <ul class="sidebar-menu">
        <li><a class="nav-link" href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Table Master</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= base_url() ?>/admin/dobat">Obat</a></li>
            <li><a class="nav-link" href="<?= base_url() ?>/admin/dsupplier">Supplier</a></li>
            <li><a class="nav-link" href="<?= base_url() ?>/admin/dsatuan">Satuan</a></li>
            <li><a class="nav-link" href="<?= base_url() ?>/admin/dkategori">Kategori</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaksi</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Pejualan</a></li>
            <li><a class="nav-link" href="#">Pembelian</a></li>
          </ul>
        </li>

       <li class="menu-header">Akun</li>
        <li><a href="#" class="nav-link"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>

        <li class="menu-header">pengaturan</li>
        <li><a href="#" class="nav-link"><i class="fas fa-cog fa-spin"></i> <span>Pengaturan</span></a></li>

        <li><a href="<?= base_url('admin/blankpage'); ?>" class="nav-link"><i class=""></i> <span>Blank Page</span></a></li>
    </ul>
  </aside>
</div>