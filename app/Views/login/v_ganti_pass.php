<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ganti Password</h1>
		</div>

		<div class="section-body">
		<div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3">

            <div class="card card-success">
              <div class="card-header"><h4>Ganti Password</h4></div>

              <div class="card-body">

              <!-- Alert -->
              <?php if(session()->getFlashdata('gagal')){ ?>
                    <div class="alert alert-has-icon text-dark" style="background-color:#ffb0b0;">
                      <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                      <div class="alert-body">
                      <?= session()->getFlashdata('gagal'); ?>
                      </div>
                    </div>
                    <?php } ?>
              <!-- End Alert -->

                <form method="POST" action="<?= base_url('/admin/gantiPassAksi'); ?>">
                  <div class="form-group">
                    <label for="email">Password Lama</label>
                    <input type="text" class="form-control <?= ($validation->hasError('pass_lama') ? 'is-invalid' : ''); ?>" value="<?= old('pass_lama'); ?>" name="pass_lama" autofocus>
                    <div class="invalid-feedback">
                      <?= $validation->getError('pass_lama'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" value="<?= old('password'); ?>" name="password">
                    <div class="invalid-feedback">
                      <?= $validation->getError('password'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control <?= ($validation->hasError('konfir_password') ? 'is-invalid' : ''); ?>" value="<?= old('konfir_password'); ?>" name="konfir_password">
                    <div class="invalid-feedback">
                      <?= $validation->getError('konfir_password'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                      Ganti Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
		</div>
	</section>
</div>
<?= $this->endSection(); ?>