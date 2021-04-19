<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dsatuan'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Ubah Data Satuan</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dsatuan') ?>">Data Satuan</a></div>
                <div class="breadcrumb-item">Ubah Data Satuan</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card mx-auto" style = "width:65%;">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" name="satuan" class="form-control">
                                </div>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                                <a href="<?= base_url('admin/dsatuan'); ?>" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>