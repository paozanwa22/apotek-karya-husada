<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('/laporan/laporan'); ?>">
                    <div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div>
                </a>
            </div>
            <h1>Laporan Penjualan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laporan Penjualan</h4>
                        </div>
                        <form action="<?= base_url('/laporan/caridata'); ?>" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Dari tanggal</label>
                                        <input type="date" name="tanggal_mulai" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sampai tanggal</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_akhir" class="form-control">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <p>
                        <h2 class="text-center">Laporan Penjualan Obat</h2>
                        <p class="text-center"><?= $tanggal['awal']; ?> - <?= $tanggal['akhir']; ?></p>
                        </p>
                        <table border="1" width="100%">
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php
                            $no = 1;
                            $total = 0;
                            foreach ($caridata as $d) {
                                $total1 = $d['total'];
                                $total +=  $total1;
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['no_transaksi'] ?></td>
                                    <td><?= $d['nm_obat'] ?></td>
                                    <td><?= $d['jumlah'] ?></td>
                                    <td>Rp<?= number_format($d['total']) ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <p>
                        <h5 class="text-right">Total Penjualan Obat : RP. <?= number_format($total); ?> ,-</h5>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->EndSection(); ?>