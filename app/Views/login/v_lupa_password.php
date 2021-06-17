<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot Password &mdash; Apotek Karya Husada</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <?= $nmApotek[0]['nm_apotek']; ?>
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <h4>Forgot Password</h4>
                            </div>

                            <div class="card-body">
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                ?>
                                    <div class="alert alert-success">
                                        <div class="alert-title">Sukses</div>
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php } ?>
                                <form action="<?= base_url('/login/lupaPasswordaksi') ?>" method="POST">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" value="<?= old('email') ?>" name="email" autofocus>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                            <?php if (session()->getFlashdata('pesan')) {
                                                echo session()->getFlashdata('pesan');
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Lupa Password
                                        </button>
                                    </div>
                                </form>
                                <center><a href="<?= base_url('login'); ?>">Kembali ke halam login</a></center>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Haikal Wahyudi <?= date('Y'); ?>
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

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>