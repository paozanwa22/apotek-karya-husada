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
                        <div class="card-header">
                            <div class="buttons">
                                <a href="<?= base_url() ?>/admin/tobat" class="btn btn-icon btn-success"><i class="fas fa-plus"></i> Data Obat</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table align="right" class="mb-4">
                                <tr>
                                    <td colspan="4">
                                        <b>Keterangan :</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="<?= base_url('/gambar/merah.jpg'); ?>" alt="ket" width="15px"></td>
                                    <td> : </td>
                                    <td>Obat sudah kadaluwarsa</td>
                                </tr>
                                <tr>
                                    <td><img src="<?= base_url('/gambar/oren.jpg'); ?>" alt="ket" width="15px"></td>
                                    <td> : </td>
                                    <td>Obat yang akan kadaluwarsa</td>
                                </tr>
                            </table>
                            <table class="table table-striped responsive nowrap table-hover" width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Suplier</th>
                                        <th>Satuan</th>
                                        <th>Kategori</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- PHP -->
                                    <?php
                                    $no = 1;
                                    foreach ($data as $d) {
                                        $kadaluwarsa = $d['tgl_kadaluarsa'];
                                        $pengurangan = date('Y-m-d', strtotime('-1 MONTH', strtotime($kadaluwarsa)));
                                        // dd($pengurangan);
                                        // echo date('Y-m-d', time() + (60 * 60 * 13)
                                        // <?php if (date('Y-m-d', time() + (60 * 60 * 13)) >= $pengurangan && date('Y-m-d', time() + (60 * 60 * 13)) <= $pengurangan) {
                                        //     echo 'bg-warning';
                                        // } elseif (date('Y-m-d', time() + (60 * 60 * 13)) >= $d['tgl_kadaluarsa']) {
                                        //     echo "bg-danger";
                                        // } 
                                    ?>

                                        <tr class=" text-dark <?php if (date('Y-m-d', time() + (60 * 60 * 13)) >= $pengurangan && date('Y-m-d', time() + (60 * 60 * 13)) <= $d['tgl_kadaluarsa']) {
                                                                    echo 'bg-warning';
                                                                } else if (date('Y-m-d', time() + (60 * 60 * 13)) >= $d['tgl_kadaluarsa']) {
                                                                    echo "bg-danger";
                                                                } ?>">
                                            <td><?= $no++ ?></td>
                                            <td><?= $d['kd_obat']; ?></td>
                                            <td><?= $d['nm_obat']; ?></td>
                                            <td><?= $d['nama']; ?></td>
                                            <td><?= $d['satuan']; ?></td>
                                            <td><?= $d['kategori']; ?></td>
                                            <td><?= $d['harga_beli']; ?></td>
                                            <td><?= $d['harga_jual']; ?></td>
                                            <td><?= $d['stok']; ?></td>
                                            <td><?= $d['tgl_kadaluarsa']; ?></td>
                                            <!-- <td><?= $pengurangan ?></td> -->
                                            <td>
                                                <div class="buttons">
                                                    <a href="<?= base_url('/admin/uobat/' . $d['kd_obat']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Ubah</a>
                                                    <a href="<?= base_url('/admin/hobat/' . $d['kd_obat']); ?>" class="btn btn-danger btn-sm hapus-data"><i class="fa fa-trash"></i> Hapus</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- PHP -->
                                    <?php } ?>

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