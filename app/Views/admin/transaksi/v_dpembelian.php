<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Histori Pembelian Obat</h1>
		</div>

		<div class="section-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped responsive nowrap" width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Banyak</th>
                                        <th>Total</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kimia Farma</td>
                                        <td>20/01/2021</td>
                                        <td>4</td>
                                        <td>Rp120.000</td>
                                        <td>
											<a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</a>
											<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->EndSection(); ?>