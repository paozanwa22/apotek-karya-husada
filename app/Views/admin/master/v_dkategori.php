<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kategori Obat</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
                <div class="breadcrumb-item">Data Kategori</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped responsive nowrap table-hover" width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $d) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $d['kategori'] ?></td>
                                            <td width="37px">
                                                <a href="<?= base_url() ?>/admin/dkategori/<?= $d['id_k']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                                                <a href="<?= base_url() ?>/admin/hkategori/<?= $d['id_k']; ?>" class="btn btn-danger btn-sm hapus-data"><i class="fa fa-trash"> Hapus</i></a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div><!-- card-body-->
                    </div>
                    <!--card-->
                </div>
                <!--col-->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Kategori</h4>
                        </div>
                        <div class="card-body">

                            <?php if ($cariid_k == "") { ?>

                                <form action="<?= base_url('/admin/taksikategori'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="satuan">Kategori</label>
                                        <input type="text" name="kategori" class="form-control <?= $validation->hasError('kategori') ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                    <!-- <a href="<?= base_url('admin/dkategori'); ?>" class="btn btn-danger">Batal</a> -->
                                </form>

                            <?php } else { ?>

                                <form action="<?= base_url('/admin/uaksikategori'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="satuan">Kategori</label>
                                        <input type="hidden" name="id_k" value="<?= $cariid_k->id_k; ?>">
                                        <input type="text" name="kategori" value="<?= $cariid_k->kategori; ?>" class="form-control <?= $validation->hasError('kategori') ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-sync-alt"></i> Perbarui</button>
                                    <a href="<?= base_url('admin/dkategori'); ?>" class="btn btn-danger">Batal</a>
                                </form>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!--col-md-5-->
            </div>
            <!--row-->
        </div>
        <!--section-body-->
    </section>
</div>
<?= $this->endSection(); ?>