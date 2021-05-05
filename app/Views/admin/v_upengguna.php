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
                                <input type="hidden" name="id" value="<?=$udata->id_pengguna; ?>">
                                <input type="text" value="<?= $udata->nama; ?>" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" required value="Laki-Laki" <?php if($udata->jk == "Laki-Laki"){ echo "checked"; } ?>>
                                        <label class="form-check-label" for="exampleRadios1">
                                        Laki - Laki
                                    </label>
                                    </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" required value="Perempuan" <?php if($udata->jk == "Perempuan"){ echo "checked"; } ?>>
                                    <label class="form-check-label" for="exampleRadios2">
                                    Perempuan
                                    </label>
                                </div>
                                </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" value="<?= $udata->password; ?>" name="password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kategori">No Hp</label>
                                <input type="number" name="no_tlp" value="<?= $udata->no_tlp; ?>" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="harga beli">Hak Akses</label>
                                <select name="level" class="form-control">
                                    <option value="Admin" <?php if($udata->level == "Admin"){echo 'selected';} ?>>Admin</option>
                                    <option value="Kasir" <?php if($udata->level == "Kasir"){echo 'selected';} ?>>Kasir</option>
                                    <option value="Pimpinan" <?php if($udata->level == "Pimpinan"){echo 'selected';} ?>>Pimpinan</option>
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