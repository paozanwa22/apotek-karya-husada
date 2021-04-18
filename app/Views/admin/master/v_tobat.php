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
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Kode Obat">Kode Obat</label>
                                <input type="text" name="kd_obat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama obat">Nama Obat</label>
                                <input type="text" name="nm_obat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select name="id_s" class="form-control">
                                    <option value="">- Pilih Satuan -</option>
                                    <option value="Box">Box</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="id_k" class="form-control">
                                    <option value="">- Pilih Kategori -</option>
                                    <option value="Obat Keras">Obat Keras</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="harga beli">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <b>Rp</b>
                                        </div>
                                    </div>
                                    <input type="text" name="harga_beli" class="form-control currency">
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
                                    <input type="text" name="harga_jual" class="form-control currency">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tanggal kadaluarsa">Tanggal Kadaluarsa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <input type="date" name="tgl_kadaluarsa" class="form-control">
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="<?= base_url('admin/dobat'); ?>" class="btn btn-danger">Batal</a>
                            <div class="buttons">
                                    <a href="#" class="btn btn-icon btn-success"><i class="fas fa-plus"></i> Data Obat</a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>