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
                    <form action="<?= base_url('/admin/addPembelian'); ?>" method="post">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 text-right"><strong>No Transaksi</strong></label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_transaksi" value="<?= $autonumber ?>" readonly>
                                </div>

                                <label class="col-form-label col-md-2 text-right"><strong>Tanggal</strong></label>
                                <div class="col-md-4">
                                    <input type="text" name="tgl_beli" value="<?= date('d F Y'); ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 text-right"><strong>Nama Pemasok</strong></label>
                                <div class="col-md-4">
                                    <select name="nm_pemasok" required class="form-control custom-select form-control-sm" onchange="document.location.href=this.options[this.selectedIndex].value;">
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach ($dsup as $d) {
                                        ?>
                                            <option value="<?= base_url('/admin/tpembelian/' . $d['kd_sup']); ?>" <?php if ($idsup == null) {
                                                                                                                        echo "";
                                                                                                                    } else if ($d['nama'] == $idsup['nama']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>><?= $d['nama'];  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" name="kd_sup" value="<?php if ($idsup != null) {
                                                                                echo $idsup['kd_sup'];
                                                                            } else if ($idsup = null) {
                                                                                echo "";
                                                                            } ?>">
                                <label class="col-form-label col-md-2 text-right"><strong>Nama Obat</strong></label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <select name="nm_obat" required class="custom-select" id="inputGroupSelect04">
                                            <option value="">- Pilih Obat -</option>
                                            <?php foreach ($cariidobat as $obat) {
                                            ?>
                                                <option value="<?= $obat['kd_obat'] ?>"><?= $obat['nm_obat'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                    </form><!-- End Form -->

                </div>
                <form action="<?= base_url('/admin/updatecartpembelian'); ?>">
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
                            $no = 1;
                            $keranjang = $cart->contents();
                            $i = 1;
                            foreach ($keranjang as $data) {

                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['name']; ?></td>
                                    <td>Rp<?= number_format($data['price']) ?></td>
                                    <td width="90px"><input type="number" class="form-control" min="1" name="qty<?= $i++; ?>" value="<?= $data['qty']; ?>"></td>
                                    <td>Rp<?= number_format($data['subtotal']); ?></td>
                                    <td><a href="<?= base_url('/admin/deletecartpembelian/' . $data['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <Button type="submit" class="btn btn-warning"> Update</i></Button>
                        </div>
                </form>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-dark">
                            <h2 class="text-right text-white p-1 mt-2">Rp<?= number_format($cart->total()); ?></h2>
                        </div>
                    </div>

                    <form action="<?= base_url('/admin/tpembelianaksi') ?>" method="post">
                        <input type="hidden" class="form-control" name="no_transaksi" value="<?= $autonumber ?>" readonly>
                        <div class="buttons float-right">
                            <button class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
                            <a href="#" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                        </div>
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
<?= $this->endSection(); ?>