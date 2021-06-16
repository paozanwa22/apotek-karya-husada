<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.css">

  <!-- <link rel="stylesheet" href="/template/node_modules/selectric/public/selectric.css"> -->


  <!-- Data Table -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body class="<?php if (($uri->uri->getSegment(2) == 'tpenjualan') || ($uri->uri->getSegment(2) == 'tpembelian') || ($uri->uri->getSegment('2') == 'pilihObat')) {
                echo "sidebar-mini";
              } ?>">
  <!-- Data Alert -->
  <div id="flash" data-flash="<?= session()->getFlashdata('sukses'); ?>"></div>
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


      <!-- General JS Scripts -->
      <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/jquery/dist/popper.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
      <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.mask.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>

      <script src="<?= base_url() ?>/template/node_modules/chart.js/dist/Chart.min.js"></script>
      <script src="<?= base_url() ?>/template/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="/template/node_modules/selectric/public/jquery.selectric.min.js"></script>
      <!-- Alert -->
      <script src="<?= base_url(); ?>/template/node_modules/sweetalert/dist/sweetalert.min.js"></script>

      <!-- Template JS File -->
      <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
      <script src="<?= base_url() ?>/template/assets/js/scripts2.js"></script>
      <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>
      <script src="<?= base_url() ?>/template/assets/js/chart-setting.js"></script>

      <script>
        function previewImage() {
          const sampul = document.querySelector('#sampul');
          const sampulLabel = document.querySelector('.custom-file-label');
          const imgPreview = document.querySelector('.img-preview');

          sampulLabel.textContent = sampul.files[0].name;

          const fileSampul = new FileReader();
          fileSampul.readAsDataURL(sampul.files[0]);

          fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
          }
        }

        // Close Alert
        setTimeout(function() {
          $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
          })
        }, 9000);

        $("#modal-1").fireModal({
          title: 'Data Obat',
          body: $("#modal-item")
        });

        function formatAngka(angka) {
          if (typeof(angka) != 'string') angka = angka.toString();
          var reg = new RegExp('([0-9]+)([0-9]{3})');
          while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
          return angka;
        }

        <?php $cart = \Config\Services::cart(); ?>
        var total = <?= $cart->total(); ?>;
        bayar = 0;
        kembalian = 0;

        $("#total").val(total);

        $('#bayar').on('keypress', function(e) {
          var c = e.keyCode || e.charCode;
          switch (c) {
            case 8:
            case 9:
            case 27:
            case 13:
              return;
            case 65:
              if (e.ctrlKey === true) return;
          }
          if (c < 48 || c > 57) e.preventDefault();
        }).on('keyup', function() {
          var inp = $(this).val().replace(/\./g, '');

          // set nilai ke variabel bayar
          bayar = new Number(inp);
          $(this).val(formatAngka(inp));

          // set kembalian, validasi
          if (bayar > total) kembalian = bayar - total;
          if (total > bayar) kembalian = 0;
          $('#kembali').val(formatAngka(kembalian));
        });

        // Chart
        "use strict";
        <?php
        // Fungsi bulan dalam bahasa indonesia
        function bulan($bln)
        {
          $bulan = $bln;
          switch($bulan){
            case 1 : $bulan="Januari";
            Break;
            case 2 : $bulan="Februari";
            Break;
            case 3 : $bulan="Maret";
            Break;
            case 4 : $bulan="April";
            Break;
            case 5 : $bulan="Mei";
            Break;
            case 6 : $bulan="Juni";
            Break;
            case 7 : $bulan="Juli";
            Break;
            case 8 : $bulan="Agustus";
            Break;
            case 9 : $bulan="September";
            Break;
            case 10 : $bulan="Oktober";
            Break;
            case 11 : $bulan="November";
            Break;
            case 12 : $bulan="Desember";
            Break;
          }
          return $bulan;
        }
        $db = \Config\Database::connect();
        $bln = date('m');
        $thn = date('Y');
        $ss = $db->query("SELECT MONTH(tgl_jual) AS bulan FROM tb_penjualan WHERE YEAR(tgl_jual)='$thn' GROUP BY MONTH(tgl_jual)");
        $penghasilan = $db->query("SELECT SUM(total) AS pendapatan FROM tb_penjualan WHERE YEAR(tgl_jual)='$thn' GROUP BY MONTH(tgl_jual)");
        $a = $ss->getResultArray();
        $b = $penghasilan->getResultArray();
        ?>
        var ctx = document.getElementById("perbulan").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [<?php foreach ($a as $c){ ?> "<?= bulan($c['bulan']) ?>", <?php } ?>

            ],
            datasets: [{
              label: 'Pendapatan',
              data: [<?php foreach($b as $p){ echo '"' . $p['pendapatan'] . '",';} ?>],
              borderWidth: 2,
              backgroundColor: 'rgb(144, 255, 144,0.2)',
              borderWidth: 3,
              borderColor: 'rgb(71, 195, 99)',
              pointBorderWidth: 0,
              pointBorderColor: 'transparent',
              pointRadius: 3,
              pointBackgroundColor: 'transparent',
              pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
          },
          options: {
            layout: {
              padding: {
                bottom: -1,
                left: -1
              }
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                gridLines: {
                  display: false,
                  drawBorder: false,
                },
                ticks: {
                  beginAtZero: true,
                  display: false
                }
              }],
              xAxes: [{
                gridLines: {
                  drawBorder: false,
                  display: false,
                },
                ticks: {
                  display: false
                }
              }]
            },
          }
        });
      </script>
      <!-- End Chart -->
</body>

</html>