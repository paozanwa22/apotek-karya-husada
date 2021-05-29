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
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card card-success">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" readonly name="cari" value="<?= ($uri->uri->getSegment("2") == "pilihObat") ? $dobat->nm_obat : ''; ?>" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-search"></i> Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" min="1" name="cari" class="form-control" placeholder="Qty">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success btn-lg">Tambah</button>
                                </div>
                            </div><br>

                            <table class="table table-striped responsive nowrap" width="100%" id="transaksi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat Yang Dijual</th>
                                        <th>Harga Satuan</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            Bodrex
                                        </td>
                                        <td>Rp10.000</td>
                                        <td>1</td>
                                        <td>Rp20.000</td>
                                        <td><a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- <Button class="btn btn-primary"><i class="fa fa-plus"> Baru</i></Button> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body bg-dark">
                                            <h2 class="text-right text-white p-1 mt-2">Rp10.000</h2>
                                        </div>
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
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-stripped" width="100%" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Supplier</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nm_obat']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['harga_beli']; ?></td>
                                    <td><?= $d['harga_jual']; ?></td>
                                    <td><?= $d['stok']; ?></td>
                                    <td><a href="<?= base_url('/admin/pilihObat/' . $d['kd_obat']); ?>" class="btn btn-secondary">Pilih</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end modal -->

</div>
<?= $this->endSection(); ?>