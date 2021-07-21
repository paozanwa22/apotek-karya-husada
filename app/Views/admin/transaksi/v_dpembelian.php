<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Histori Pembelian Obat</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped responsive nowrap" width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($dpembelian as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['tgl_beli']; ?></td>
                                            <td>
                                                <a href="<?= base_url('/admin/detailpembelian/' . $data['id_invoice']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?= base_url('/admin/hapuspembelain/' . $data['id_invoice']) ?>" class="btn btn-danger btn-sm hapus-data"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
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
<?= $this->EndSection(); ?>