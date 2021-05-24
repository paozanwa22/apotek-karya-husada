
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Apotek</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
</head>

<body id='bg-login'>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
              <?php echo $nmaptk[0]['nm_apotek']; ?>
            </div>
            <div class="card card-success">
              <div class="card-header"><h4>Silahkan Login Terlebih Dahulu</h4></div>

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

                <form method="POST" action="<?= base_url('login/ceklogin'); ?>">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : '') ?>" name="email" value="<?= old('email'); ?>" autofocus>
                    <div class="invalid-feedback">
                      <?= $validation->getError('email'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label class="control-label">Password</label>
                    </div>
                    <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>" name="password" value="<?= old('password'); ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('password'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>

              </div>
            </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/popper.min.js"></script>
  <script src="<?= base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/stisla.js"></script>

  <!-- Close Alert -->
  <script>
    setTimeout(function() {
      $('.alert').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      })
    }, 9000);
  </script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
