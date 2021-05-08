<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dpengguna'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Tambah Data Pengguna</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dpengguna') ?>">Data Pengguna</a></div>
                <div class="breadcrumb-item">Tambah Data Pengguna</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card mx-auto" style="width:60%">
                        <div class="card-body">
                        <form action="<?= base_url(); ?>/admin/taksipengguna" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?= old('nama'); ?>" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama'); ?>
                            </div>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?= old('email'); ?>" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="<?= old('password') ?>" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="harga beli">Hak Akses</label>
                                <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : '' ?>">
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('level'); ?>
                            </div>
                            </div>

                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Simpan</button>
                            <a href="<?= base_url('admin/dpengguna'); ?>" class="btn btn-danger">Batal</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>