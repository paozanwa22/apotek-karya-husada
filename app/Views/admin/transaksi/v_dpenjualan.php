<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Penjualan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
				<div class="breadcrumb-item">Data Transaksi</div>
			</div>
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
										<th>Obat Yang Terjual</th>
										<th>Admin</th>
										<th>Tanggal Pembelian</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<p>
												<span class="badge badge-success">20</span>
												<span class="badge badge-success">aaaa aaaa aa</span>
											</p>
											
                                        </td>
										<td>Haikal</td>
										<td>20-01-2021</td>
										<td>
											<a href="" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>
											<p>
												<span class="badge badge-success">15</span>
												<span class="badge badge-success">aaaa aaaa aa</span>
											</p>
											<p>
												<span class="badge badge-success">10</span>
												<span class="badge badge-success">aaaa aaaa aa</span>
											</p>
                                        </td>
										<td>Haikal</td>
										<td>20-01-2021</td>
										<td>
											<a href="" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</a>
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

<?= $this->endSection(); ?>