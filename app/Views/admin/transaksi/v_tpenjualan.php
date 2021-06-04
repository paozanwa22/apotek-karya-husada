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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success" id="mycard-dimiss">
                        <div class="card-body">
                            <div class="author-box-details">
                                <a data-dismiss="#mycard-dimiss" class="btn btn-icon btn-danger float-right btn-sm" href="#"><i class="fas fa-times"></i></a>
                                <h6><i class="fa fa-bullhorn"></i> Informasi</h6>
                            </div>
                            <p>
                                Jika anda melakukan perubahan jumlah <strong>Qty</strong> maka klik tombol <strong>Update</strong> untuk menyimpan perubahannya,
                                jika tidak menekan tombol update maka perubahan pada <strong>Qty</strong> tidak akan tersimpan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Alert -->
                            <?php if (session()->getFlashdata('gagal')) { ?>
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Pemberitahuan</div>
                                        <?= session()->getFlashdata('gagal'); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- End Alert -->

                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h4 class="mx-auto">Info</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>No Transaksi</label>
                                                <input type="text" value="<?= $autonumber; ?>" class="form-control form-control-sm" readonly>

                                                <label>Tanggal</label>
                                                <input type="text" name="tanggal" value="<?= date('d/m/y'); ?>" class="form-control form-control-sm" readonly>

                                                <label>Apoteker</label>
                                                <input type="text" class="form-control form-control-sm" value="<?= session()->get('nama'); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="<?= base_url('/admin/add'); ?>" method="post">
                                                <input type="hidden" name="kd_obat" value="<?= ($uri->uri->getSegment("2") == "pilihObat") ? $dobat->kd_obat : ''; ?>">
                                                <input type="hidden" name="harga_jual" value="<?= ($uri->uri->getSegment("2") == "pilihObat") ? $dobat->harga_jual : ''; ?>">
                                                <div class="input-group">
                                                    <input type="text" readonly name="nama" value="<?= ($uri->uri->getSegment("2") == "pilihObat") ? $dobat->nm_obat : ''; ?>" class="form-control">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-search"></i> Cari</button>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" min="1" name="qty" class="form-control" required placeholder="Qty">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-success btn-lg">Tambah</button>
                                        </div>
                                        </form>
                                    </div><br>
                                    <form action="<?= base_url('/admin/updatecart'); ?>" method="post">
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
                                                <?php
                                                $keranjang = $cart->contents();
                                                $no = 1;
                                                $i = 1;
                                                foreach ($keranjang as $caobat) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $caobat['name']; ?></td>
                                                        <td>Rp<?= number_format($caobat['price']); ?></td>
                                                        <td width="100px"><input type="number" name="qty<?= $i++; ?>" value="<?= $caobat['qty']; ?>" min="1" class="form-control form-control-sm"></td>
                                                        <td>Rp<?= number_format($caobat['subtotal']); ?></td>
                                                        <td>
                                                            <a href="<?= base_url('/admin/deletecart/' . $caobat['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <Button type="submit" class="btn btn-warning">Update</Button>
                                            </div>
                                    </form>
                                    <div class="col-md-6">
                                        <form action="<?= base_url('/admin/tpenjualanaksi'); ?>" method="post">
                                            <input type="hidden" name="no_trs" value="<?= $autonumber; ?>">
                                            <div class="card">
                                                <div class="card-body bg-dark">
                                                    <input type="hidden" id="total" value="<?= $cart->total(); ?>">
                                                    <h2 class="text-right text-white p-1 mt-2">Rp<?= number_format($cart->total()); ?></h2>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-4 col-lg-3"><strong>Bayar</strong></label>
                                                <div class="col-sm-12 col-md-7 col-lg-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <b>Rp</b>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="bayar" id="bayar" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label class="col-form-label text-md-right col-12 col-md-4 col-lg-3"><strong>Kembalian</strong></label>
                                                <div class="col-sm-12 col-md-7 col-lg-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-secondary">
                                                                <b>Rp</b>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" name="kembali" id="kembali" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons float-right">
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                                            </div>
                                        </form>
                                    </div>
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
                                <td><?= ($d['stok'] == "0") ? "<div class='text-danger'>Habis</div>" : $d['stok']; ?></td>
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