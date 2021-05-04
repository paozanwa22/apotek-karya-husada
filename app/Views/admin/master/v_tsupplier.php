<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dsupplier'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Tambah Data Supplier</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dsupplier') ?>">Data Supplier</a></div>
                <div class="breadcrumb-item">Tambah Data Supplier</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card mx-auto" style = "width:65%;">
                        <div class="card-body">
                            <form action="<?= base_url(); ?>/admin/ssuplier" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Kode Suplier</label>
                                    <input type="text" name="kd_sup" value="<?= $autonumber; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control  <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp">No Hp</label>
                                    <input type="number" name="no_tlp" class="form-control  <?= $validation->hasError('no_tlp') ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_tlp'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <a href="<?= base_url('admin/dsupplier'); ?>" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>