<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Apotek Karya Husada</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">APT</a>
    </div>
    <ul class="sidebar-menu">
        <li class="<?=($uri->uri->getSegment('2') == '') ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Beranda</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="nav-item dropdown <?= ($uri->uri->getSegment('2')=='dobat') || ($uri->uri->getSegment('2')=='dsupplier') || ($uri->uri->getSegment('2')=='dsatuan') || ($uri->uri->getSegment('2')=='dkategori') ? 'active' : '' ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
          <ul class="dropdown-menu">
            <li class="<?= ($uri->uri->getSegment('2')=='dobat') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url() ?>/admin/dobat">Obat</a></li>
            <li class="<?= ($uri->uri->getSegment('2')=='dsupplier') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url() ?>/admin/dsupplier">Supplier</a></li>
            <li class="<?= ($uri->uri->getSegment('2')=='dsatuan') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url() ?>/admin/dsatuan">Satuan</a></li>
            <li class="<?= ($uri->uri->getSegment('2')=='dkategori') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url() ?>/admin/dkategori">Kategori</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown <?=($uri->uri->getSegment('2')=='tpenjualan') || ($uri->uri->getSegment('2')=='tpembelian') || ($uri->uri->getSegment('2')=='dpenjualan') || ($uri->uri->getSegment('2')=='dpembelian') ? 'active' : '' ?>">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill"></i> <span>Transaksi</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= base_url(); ?>/admin/tpenjualan">Pejualan</a></li>
            <li><a class="nav-link" href="<?= base_url(); ?>/admin/tpembelian">Pembelian</a></li>
            <li class="<?= ($uri->uri->getSegment('2')=='dpenjualan') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url(); ?>/admin/dpenjualan">History Penjualan</a></li>
            <li class="<?= ($uri->uri->getSegment('2')=='dpembelian') ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url(); ?>/admin/dpembelian">History Pembelian</a></li>
          </ul>
        </li>

        <li class="<?=($uri->uri->getSegment('2')=='laporan') ? 'active' : '';?>"><a href="<?= base_url(); ?>/admin/laporan" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a></li>

       <li class="menu-header">Akun</li>
        <li class="<?=($uri->uri->getSegment('2')=='dpengguna') ? 'active' : '';?>"><a href="<?= base_url(); ?>/admin/dpengguna" class="nav-link"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>

        <li class="menu-header">pengaturan</li>
        <li class="<?=($uri->uri->getSegment('2')=='profile_aptk') ? 'active' : '';?>"><a href="<?= base_url(); ?>/admin/profile_aptk" class="nav-link"><i class="fas fa-user"></i> <span>Profile Apotek</span></a></li>
    </ul>
  </aside>
</div>