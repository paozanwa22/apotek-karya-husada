<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Data Obat - Obatan</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin'); ?>">Beranda</a></div>
                <div class="breadcrumb-item">Data Obat</div>
            </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Tanggal Kadaluarsa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>a</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endsection(); ?>