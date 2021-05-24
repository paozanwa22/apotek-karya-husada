<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dpengguna'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Ubah Data Pengguna</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dpengguna') ?>">Data Pengguna</a></div>
                <div class="breadcrumb-item">Ubah Data Pengguna</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card mx-auto" style="width:60%">
                        <div class="card-body">
                        <form action="<?=base_url('/admin/uaksipengguna'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id" value="<?=$udata->id_pengguna?>">
                                <input type="text" name="nama" class="form-control" value="<?=$udata->nama?>" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control <?= ($validation->hasError('email') ? 'is-invalid':''); ?>" value="<?= ($validation->hasError('email') ? old('email') : $udata->email); ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="<?=$udata->password?>" class="form-control" required>
                            </div> -->

                            <div class="form-group">
                                <label for="harga beli">Hak Akses</label>
                                <select name="level" class="form-control" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Apoteker">Apoteker</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                </select>
                            </div>

                            <button class="btn btn-success" type="submit"><i class="fa fa-sync-alt"></i> Perbarui</button>
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