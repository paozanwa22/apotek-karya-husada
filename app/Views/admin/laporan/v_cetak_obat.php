<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Cetak Penjualan</title>
</head>

<body style="background: #cecece;">
    <div class="container mt-2">
        <div class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-7">
                                    <b>Apotek Karya Husada</b><br>
                                    Jln. Masbagik - Labuhan Lombok
                                </div>
                                <div class="col-md-5">
                                    <table align="right">
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td><?= date('d-m-Y'); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-center">Laporan Stok Obat</h5>

                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Suplier</th>
                                                <th>Satuan</th>
                                                <th>Kategori</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Tanggal Kadaluarsa</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- PHP -->
                                            <?php
                                            $no = 1;
                                            foreach ($lapObat as $d) {
                                            ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $d['kd_obat']; ?></td>
                                                    <td><?= $d['nm_obat']; ?></td>
                                                    <td><?= $d['nama']; ?></td>
                                                    <td><?= $d['satuan']; ?></td>
                                                    <td><?= $d['kategori']; ?></td>
                                                    <td><?= $d['harga_beli']; ?></td>
                                                    <td><?= $d['harga_jual']; ?></td>
                                                    <td><?= $d['stok']; ?></td>
                                                    <td><?= $d['tgl_kadaluarsa']; ?></td>
                                                </tr>

                                                <!-- PHP -->
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        print();
    </script>
    <script src="<?= base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>