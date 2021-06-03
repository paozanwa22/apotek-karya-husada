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
                                <div class="col-md-12">
                                    <h5 class="text-center">Detail Pembelian Obat</h5>
                                    <br>

                                    <table border="1" class="" width="100%">
                                        <tbody>

                                            <tr height="30px" class="text-center">
                                                <td width="30px" class="text-center">No</td>
                                                <td>Nama Obat</td>
                                                <td>Suplier</td>
                                                <td width="150px">Harga Satuan</td>
                                                <td width="100px">Jumlah</td>
                                                <td width="150px">Subtotal</td>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $subtotal = 0;
                                            $total = 0;
                                            foreach ($idInvoice as $data) {
                                                $subtotal = $data['harga'] * $data['banyak'];
                                                $total += $subtotal;
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $data['nm_obat']; ?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td>Rp<?= number_format($data['harga']); ?></td>
                                                    <td class="text-center"><?= $data['banyak']; ?></td>
                                                    <td>Rp<?= number_format($data['total_beli']); ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="5" class="text-center"><b>Total</b></td>
                                                <td><b>Rp<?= number_format($total); ?></b></td>
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
        <script>
            print();
        </script>
        <script src="<?= base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>