<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
    <div class="main-content">
        <div class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="<?= base_url(); ?>/admin/dpenjualan" class="btn btn-icon"><i class="fa fa-arrow-left"></i></a>
                </div>
                <h1>Transaksi Pembelian</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
                    <div class="breadcrumb-item">Teransaksi Pembelian</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">

                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2 text-right"><strong>Kode Transaksi</strong></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control form-control-sm" readonly>
                                        </div>

                                        <label class="col-form-label col-md-2 text-right"><strong>Tanggal</strong></label>
                                        <div class="col-md-4">
                                            <input type="text" value="<?= date('d F Y'); ?>" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2 text-right"><strong>Nama Pemasok</strong></label>
                                        <div class="col-md-4">
                                            <select class="form-control custom-select form-control-sm">
                                                <option>Tech</option>
                                                <option>News</option>
                                                <option>Political</option>
                                            </select>
                                        </div>

                                        <label class="col-form-label col-md-2 text-right"><strong>Nama Obat</strong></label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                <input type="text" name="" class="form-control form-control-sm" readonly>
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
                                            <div class="form-group">
                                            <label><strong>Keterangan</strong></label>
                                                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan Jika Ada..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-dark">
                                                <h2 class="text-right p-1 mt-2">Rp10.000</h2>
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