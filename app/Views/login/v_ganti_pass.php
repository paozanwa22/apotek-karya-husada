<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ganti Password</h1>
		</div>

		<div class="section-body">
		<div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-success">
              <div class="card-header"><h4>Ganti Password</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Password Lama</label>
                    <input type="text" class="form-control" name="pass_lama" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password Baru</label>
                    <input id="password-confirm" type="password" class="form-control" name="konfir_password" required>
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