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
            <h1>Detail Pembelian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('/admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('/admin/dpenjualan') ?>">History Pembelian</a></div>
                <div class="breadcrumb-item">Detail Pembelian</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-7">
                                    <?php
                                    $db = \Config\Database::connect();
                                    $data = $db->query('SELECT nm_apotek,alamat FROM tb_profile');
                                    $row = $data->getRow();
                                    echo "<b>" . $row->nm_apotek . "</b><br>";
                                    echo "<small>" . $row->alamat . "</small>";
                                    ?>
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
                                    <h5 class="text-center">Detail Pembelian Obat</h5>
                                    <br>

                                    <table border="1" class="" width="100%">
                                        <tbody>

                                            <tr height="30px" class="text-center">
                                                <td width="30px" class="text-center">No</td>
                                                <td>Nama Obat</td>
                                                <td>Suplier</td>
                                                <td width="150px">Harga Satuan</td>
                                                <td width="100px">Jumlah</td>
                                                <td width="150px">Subtotal</td>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $subtotal = 0;
                                            $total = 0;
                                            foreach ($dpembelian as $data) {
                                                $subtotal = $data['harga'] * $data['banyak'];
                                                $total += $subtotal;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nm_obat']; ?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td>Rp<?= number_format($data['harga']); ?></td>
                                                    <td class="text-center"><?= $data['banyak']; ?></td>
                                                    <td>Rp<?= number_format($data['total_beli']); ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="5" class="text-center"><b>Total</b></td>
                                                <td><b>Rp<?= number_format($total); ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br><a href="<?= base_url('/cetak/cetak_pembelian/' . $data['id_invoice']); ?>" class="btn btn-light" target="_blank"><i class="fa fa-print"></i> Cetak</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->EndSection(); ?>