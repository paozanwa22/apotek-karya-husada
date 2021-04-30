<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
            <a href="<?= base_url('admin/dobat'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
            </div>
            <h1>Tambah data obat</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dobat') ?>">Data Obat</a></div>
                <div class="breadcrumb-item">Tambah Data Obat</div>
			</div>
        </div>

        <div class="section-body">
        <?php if(session()->getFlashdata('sukses')){?>
            <div class="alert alert-success"><?= session()->getFlashdata('sukses'); ?></div>
        <?php }?>
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="<?= base_url('/admin/sobat'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="Kode Obat">Kode Obat</label>
                                <input type="text" name="kd_obat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama obat">Nama Obat</label>
                                <input type="text" name="nm_obat" value="<?= old('nm_obat'); ?>" class="form-control <?= ($validation->hasError('nm_obat') ? 'is-invalid' : ''); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nm_obat'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Suplier</label>
                                <select name="id_sup" class="form-control <?= ($validation->hasError('id_sup') ? 'is-invalid' : ''); ?>">
                                    <option value="">- Pilih Suplier -</option>
                                    <option value="Box">PT. Kimia Farma</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_sup'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_k" class="form-control <?= ($validation->hasError('id_k') ? 'is-invalid' : ''); ?>">
                                    <option value="">- Pilih Kategori -</option>
                                    <option value="Obat Keras">Obat Keras</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_k'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga beli">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <b>Rp</b>
                                        </div>
                                    </div>
                                    <input type="text" name="harga_beli" value="<?= old('harga_beli'); ?>" class="form-control currency <?= ($validation->hasError('harga_beli') ? 'is-invalid' : ''); ?>">
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('harga_beli'); ?>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga jual">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <b>Rp</b>
                                        </div>
                                    </div>
                                    <input type="text" name="harga_jual" value="<?= old('harga_jual'); ?>" class="form-control currency <?= ($validation->hasError('harga_jual') ? 'is-invalid' : ''); ?>">
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('harga_jual'); ?>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" value="<?= old('stok'); ?>" class="form-control <?= ($validation->hasError('stok') ? 'is-invalid' : ''); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal kadaluarsa">Tanggal Kadaluarsa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="date" name="tgl_kadaluarsa" value="<?= old('tgl_kadaluarsa'); ?>" class="form-control <?= ($validation->hasError('tgl_kadaluarsa') ? 'is-invalid' : ''); ?>">
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_kadaluarsa'); ?>
                                </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
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