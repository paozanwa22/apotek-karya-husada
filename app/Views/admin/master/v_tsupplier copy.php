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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp">No Hp</label>
                                    <input type="number" name="no_tlp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <div class="col-sm-12 col-md-12">
                                        <textarea name="alamat" class="summernote-simple"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="<?= base_url('admin/dobat'); ?>" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>