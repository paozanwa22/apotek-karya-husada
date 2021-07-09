<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kadaluwarsa</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Obat Kadaluwarsa</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-has-icon">
                                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Peringatan!</div>
                                    Obat sudah kadaluwarsa, Silahkan tambah obat yang baru
                                </div>
                            </div>
                            <table class="table table-striped table-bordered" id="myTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Supplier</th>
                                        <th>Stok</th>
                                        <th>Kadaluwarsa</th>
                                        <th>Harga Jual</th>
                                        <th>Satuan</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dobat as $obat) {
                                        $kadaluwarsa = $obat['tgl_kadaluarsa'];
                                        $pengurangan = date('Y-m-d', strtotime('-1 MONTH', strtotime($kadaluwarsa)));
                                        if (date('Y-m-d', time() + (60 * 60 * 13)) >= $obat['tgl_kadaluarsa']) {

                                    ?>
                                            <tr>
                                                <td><?= $obat['nm_obat'] ?></td>
                                                <td><?= $obat['nama'] ?></td>
                                                <td><?= $obat['stok'] ?></td>
                                                <td><?= $obat['tgl_kadaluarsa'] ?></td>
                                                <td>Rp<?= number_format($obat['harga_jual']) ?></td>
                                                <td><?= $obat['satuan'] ?></td>
                                                <td><?= $obat['kategori'] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div><!-- end row -->
        </div>
    </section>
</div>

<?= $this->endsection(); ?>