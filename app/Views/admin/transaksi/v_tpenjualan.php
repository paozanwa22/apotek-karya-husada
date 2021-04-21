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
                    <div class="breadcrumb-item">Teransaksi Penjaulan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row mb-1">
                                <label class="text-md-righ col-12 col-md-1 text-bold"><strong>Kode Transaksi</strong></label>
                                <div class="col-md-3">
                                    <input type="text" name="" class="form-control form-control-sm" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-1">
                                <label class="text-md-righ col-12 col-md-1"><strong>Tanggal Pembelian</strong></label>
                                <div class="col-md-3">
                                    <input type="text" name="" value="<?= date("d/m/y"); ?>" class="form-control form-control-sm" readonly >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="text-md-righ col-12 col-md-1"><strong>Kasir</strong></label>
                                <div class="col-md-3">
                                    <input type="text" name="" value="" class="form-control form-control-sm" readonly >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>