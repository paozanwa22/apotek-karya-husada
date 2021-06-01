<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('/admin/dpenjualan'); ?>">
                    <div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div>
                </a>
            </div>
            <h1>Detail Penjualan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('/admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('/admin/dpenjualan') ?>">History Penjualan</a></div>
                <div class="breadcrumb-item">Detail Penjualan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-7">
                                    <b>Apotek Karya Husada</b><br>
                                    Jln. Masbagik - Labuhan Lombok
                                </div>
                                <div class="col-md-5">
                                    <table align="right">
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td><?= date('d-m-Y'); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-center">Detail Penjualan Obat</h5>

                                    <table border="1" class="" width="100%">
                                        <tbody>
                                            <tr height="30px" class="text-center">
                                                <td width="30px" class="text-center">No</td>
                                                <td>Nama Obat</td>
                                                <td width="150px">Harga Satuan</td>
                                                <td width="100px">Jumlah</td>
                                                <td width="150px">Subtotal</td>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $total = 0;
                                            $subtotal = 0;
                                            foreach ($idInvoice as $inv) {
                                                $jumlah = $inv['jumlah'];
                                                $satuan = $inv['harga_jual'];
                                                $total = $satuan * $jumlah;
                                                $subtotal += $total;

                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $inv['nm_obat']; ?></td>
                                                    <td><?= number_format($inv['harga_jual']); ?></td>
                                                    <td class="text-center"><?= $inv['jumlah']; ?></td>
                                                    <td><?= number_format($total) ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="4" class="text-center"><b>Total</b></td>
                                                <td><b><?= number_format($subtotal) ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br><a href="#" class="btn btn-secondary"><i class="fa fa-print"></i> Cetak</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->EndSection(); ?>