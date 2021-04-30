
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
    <div class="d-flex flex-wrap" style="background-color: #D7FFE3">
      <div class="col-lg-4 col-md-6 col-12 col-sm-8 order-lg-1 min-vh-100 order-1 bg-white">
          <div class="p-4 m-3">
            
          <img src="<?= base_url(); ?>/template/assets/img/logo.png" alt="logo" width="80px" class="rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Apotek Karya Husada</h4>
            <p class="text-muted">Silahkan <span class="font-weight-bold">Login</span></p>

            <form method="POST" action="#" novalidate="">
              <div class="form-group">
                <label for="email">Username</label>
                <input id="email" type="email" class="form-control" name="email" autofocus>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password">
              </div>

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a>
                <button type="submit" class="btn btn-success btn-lg btn-icon icon-right" tabindex="4">
                  Masuk
                </button>
              </div>

              <div>&nbsp;</div>
              <div>&nbsp;</div>
              <div>&nbsp;</div>
              <div>&nbsp;</div>

            </form>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-4 order-1 text-center" style="margin-top: 120px;">
            <h4>Apotek</h4>
            <img src="<?= base_url(); ?>/template/assets/img/login.png" width="500px" alt="Apotek">
        </div> 
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/jquery/dist/popper.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>