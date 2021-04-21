<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="<?= base_url(); ?>/admin/dpenjualan" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
                </div>
                <h1>Transaksi Penjualan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
                    <div class="breadcrumb-item active"><a href="<? base_url(); ?>/admin/dpenjualan">Data Penjaualan</a></div>
                    <div class="breadcrumb-item">Teransaksi Penjaulan</div>
                </div>
            </div>

            <div class="section-body">
            
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>