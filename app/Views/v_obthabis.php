<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Obat Habis</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Obat Habis</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-dark alert-has-icon">
                                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Peringatan!</div>
                                    Data obat sudah habis
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
                                        if ($obat['stok'] == "0") {
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
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Obat Hampir Habis</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered tbl" width="100%">
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
                                        if ($obat['stok'] > "0" && $obat['stok'] <= "15") {
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