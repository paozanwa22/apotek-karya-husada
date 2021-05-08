<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Profile</h1>
		</div>

		<div class="section-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Lengkapi Profile</h4>
                        </div>

                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><strong>Nama</strong></label>
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label text><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="d-block"><strong>Jenis Kelamin</strong></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1">
                                                <label class="form-check-label" for="exampleRadios1">Laki - Laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2">
                                                <label class="form-check-label" for="exampleRadios2">Perempuan</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><strong>No Hp</strong></label>
                                            <input type="number" name="no_tlp" class="form-control">
                                        </div>
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="avatar-item">
                                <div class="col-6 col-sm-5 col-lg-5 mb-4 mb-md-0 mx-auto">
                                    <img alt="image" src="<?= base_url(); ?>/template/assets/img/avatar/avatar-1.png" width="150px" class="img-thumbnail" data-toggle="tooltip">
                                </div>
                                <div class="form-group">
                                    <label>Ganti Poto</label>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</section>
</div>

<?= $this->endSection(); ?>