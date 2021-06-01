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
                                    <h5 class="text-center">Detail Penjualan Obat</h5>

                                    <table border="1" class="" width="100%">
                                        <tbody>
                                            <tr height="30px" class="text-center">
                                                <td width="30px" class="text-center">No</td>
                                                <td>Nama Obat</td>
                                                <td width="150px">Harga Satuan</td>
                                                <td width="100px">Jumlah</td>
                                                <td width="150px">Subtotal</td>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $total = 0;
                                            $subtotal = 0;
                                            foreach ($idInvoice as $inv) {
                                                $jumlah = $inv['jumlah'];
                                                $satuan = $inv['harga_jual'];
                                                $total = $satuan * $jumlah;
                                                $subtotal += $total;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $inv['nm_obat']; ?></td>
                                                    <td>Rp<?= number_format($inv['harga_jual']); ?></td>
                                                    <td class="text-center"><?= $inv['jumlah']; ?></td>
                                                    <td>Rp<?= number_format($total) ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="4" class="text-center"><b>Total</b></td>
                                                <td><b>Rp<?= number_format($subtotal) ?></b></td>
                                            </tr>
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