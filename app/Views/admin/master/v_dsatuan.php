<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Satuan Obat</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
                <div class="breadcrumb-item">Data Satuan</div>
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
                                        <th>Satuan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $d) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d['satuan']; ?></td>
                                            <td width="37px">
                                                <a href="<?= base_url() ?>/admin/dsatuan/<?= $d['id_s']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                                                <a href="<?= base_url() ?>/admin/hsatuan/<?= $d['id_s']; ?>" class="btn btn-danger btn-sm hapus-data"><i class="fa fa-trash"> Hapus</i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <!--Card-Body-->
                    </div>
                    <!--card-->
                </div>
                <!--col-->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Satuan</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($udata == '') {
                            ?>
                                <form action="<?= base_url('/admin/taksisatuan'); ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" class="form-control <?= $validation->hasError('satuan') ? 'is-invalid' : ''; ?>" value="<?= old('satuan'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                    <!-- <a href="<?= base_url('admin/dsatuan'); ?>" class="btn btn-danger">Batal</a> -->
                                </form>

                            <?php } else { ?>

                                <form action="<?= base_url('/admin/uaksisatuan'); ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id_s" value="<?= $udata->id_s; ?>">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" name="satuan" value="<?= $udata->satuan; ?>" class="form-control <?= $validation->hasError('satuan') ? 'is-invalid' : ''; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan'); ?>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"><i class="fa fa-sync-alt"></i> Perbarui</button>
                                    <a href="<?= base_url('admin/dsatuan'); ?>" class="btn btn-danger">Batal</a>
                                </form>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->
        </div>
        <!--Section-body-->
    </section>
</div>
<?= $this->endSection(); ?>