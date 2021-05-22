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
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="card card-primary">
                                    <div class="card-header">
                                        <h4 class="mx-auto">Info</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>No Transaksi</label>
                                            <input type="text" name="" class="form-control form-control-sm" readonly>
                                        
                                            <label>Tanggal</label>
                                            <input type="text" name="" value="<?= date('d/m/y'); ?>" class="form-control form-control-sm" readonly>
                                       
                                            <label>Kasir</label>
                                            <input type="text" name="" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-9">
                                    <table class="table table-striped responsive nowrap" width="100%" id="transaksi">
                                        <thead>
                                            <tr>
                                                <th>Nama Obat Yang Dijual</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class=" form-control form-control-sm" name="">
                                                        <option value="Bodrex">Bodrex</option>
                                                        <option value="Promaag">Promaag</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="" class="form-control form-control-sm" readonly></td>
                                                <td><input type="number" min="1" name="" class="form-control form-control-sm"></td>
                                                <td><input type="text" name="" class="form-control form-control-sm" readonly></td>
                                                <td><a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <!-- <Button class="btn btn-primary"><i class="fa fa-plus"> Baru</i></Button> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-dark">
                                                <h2 class="text-right p-1 mt-2">Rp10.000</h2>
                                            </div>
                                            <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-4 col-lg-3"><strong>Bayar</strong></label>
                                                <div class="col-sm-12 col-md-7 col-lg-9">
                                                    <input type="text" class="form-control form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-4 col-lg-3"><strong>Kembalian</strong></label>
                                                <div class="col-sm-12 col-md-7 col-lg-9">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="buttons float-right">
                                                <a href="#" class="btn btn-warning"><i class="fa fa-save"></i> Simpan</a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>