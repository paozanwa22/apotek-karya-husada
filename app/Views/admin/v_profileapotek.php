<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Profile Apotek Karya Husada</h1>
		</div>

		<div class="section-body">

                <div class="card mx-auto" style="width:65%">
                    <div class="card-header">
                    <div class="avatar-item mx-auto">
                        <div class="col-6 col-sm-5 col-lg-12 mb-4 mb-md-0 mx-auto">
                            <img src="<?= base_url(); ?>/template/assets/img/avatar/avatar-1.png" alt="Poto" class="rounded-circle mx-auto img-thumbnail" width="160px"><br>
                        </div>
                    </div>
                    </div>

                    <div class="card-body">
                    
                    <form action="<?= base_url(); ?>/admin/uprofileapotek" method="post">
                        <div class="form-group">
                        <label>Gamnti Logo Apotek</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><strong>Nama Apotek</strong></label>
                            <input type="hidden" name="id" value="<?= $dapt->id; ?>">
                            <input type="text" name="nm_apotek" value="<?= $dapt->nm_apotek; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><strong>Nama Pimpinan</strong></label>
                            <input type="text" name="pimpinan" value="<?= $dapt->pimpinan;?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label><strong>Alamat Apotek</strong></label>
                            <textarea name="alamat" class="form-control"><?= $dapt->alamat;?></textarea>
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simapn</button>
                    </form>

                    </div>

                </div>
		</div>
	</section>
</div>
<?= $this->EndSection(); ?>