
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      
      <!-- Header -->
      <?= $this->include("layout/v_header"); ?>
      <!-- End Header -->

      <!-- Sidebar -->
      <?= $this->include("layout/v_sidebar"); ?>
      <!-- End Sidebar -->

      <!-- Main Content -->
      <?= $this->renderSection('isi'); ?>
      <!-- End Content -->

      <!-- Footer -->
      <?= $this->include("layout/v_footer"); ?>
      <!-- End Footer -->

</body>
</html>