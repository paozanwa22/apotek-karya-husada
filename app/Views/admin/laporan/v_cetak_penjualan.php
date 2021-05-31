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
    <div class="section">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <div class="section">
                            <?php
                            $db = \Config\Database::connect();
                            $data = $db->query('SELECT nm_apotek,alamat FROM tb_profile');
                            $row = $data->getRow();
                            ?>
                            <div class="section-header text-center">
                                <p>
                                <h5><?= $row->nm_apotek ?></h5><small><?= $row->alamat; ?></small>
                                </p>
                            </div>
                            <p class="text-center">==========================</p>
                            <div class="section-body">
                                <table>
                                    <tr>
                                        <td width="130px">Tanggal</td>
                                        <td>:</td>
                                        <td><?= $dinvoice->tgl_beli; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="130px">No Transaksi</td>
                                        <td>:</td>
                                        <td><?= $dcetak[0]->no_transaksi ?></td>
                                    </tr>
                                    <tr>
                                        <td width="130px">Apoteker</td>
                                        <td>:</td>
                                        <td><?= $dinvoice->nama; ?></td>
                                    </tr>
                                </table>
                                <p class="text-center">==========================</p>
                                <b>BARANG</b>
                                <table width="100%">
                                    <?php
                                    $subtotal = 0;
                                    $total = 0;
                                    foreach ($dcetak as $data) {
                                        // dd($data);
                                        $subtotal = $data->jumlah * $data->harga_jual;
                                        $total += $subtotal;

                                    ?>
                                        <tr>
                                            <td><?= $data->nm_obat ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= $data->jumlah; ?> x Rp<?= number_format($data->harga_jual); ?></td>
                                            <td align="right">Rp<?= number_format($subtotal); ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <p class="text-center">==========================</p>
                                <table width="100%">
                                    <tr>
                                        <td>Total</td>
                                        <td width="190px">:</td>
                                        <td align="right">Rp<?= number_format($total); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bayar</td>
                                        <td>:</td>
                                        <td align="right">Rp<?= $dcetak[0]->total_bayar ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kembalian</td>
                                        <td>:</td>
                                        <td align="right"><?= $dcetak[0]->kembalian ?></td>
                                    </tr>
                                </table>
                                <p class="text-center">==========================</p>
                                <b>Info :</b>
                                <p>Melayani dengan setulus hati</p>
                                <p class="text-center">==========================</p>
                                <p class="text-center">*** Terima Kasih ***</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // print();
        // onafterprint = back;

        // function back() {
        //     history.back();
        // }
    </script>
    <script src="<?= base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>