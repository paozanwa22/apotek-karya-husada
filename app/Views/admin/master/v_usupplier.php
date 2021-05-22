<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dsupplier'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Ubah Data Supplier</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dsupplier') ?>">Data Supplier</a></div>
                <div class="breadcrumb-item">Ubah Data Supplier</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card mx-auto" style = "width:65%;">
                        <div class="card-body">
                            <form action="<?= base_url('/admin/uaksisuplier'); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nama">Kode Suplier</label>
                                    <input type="text" value="<?= $data->kd_sup; ?>" name="kd_sup" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" value="<?= $data->nama; ?>" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" name="no_hp" value="<?= $data->no_hp; ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" required><?= $data->alamat; ?></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Ubah</button>
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