<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Beranda</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-md-4">
					<div class="card h-130">
						<div class="card-body">
							<div class="card-title">
								<b>Total Obat & Supplier</b>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 text-center">
										<h4>12</h4>
										<div class="card-label small">Total Obat</div>
									</div>
									<div class="col-md-6 text-center">
										<h4>12</h4>
										<div class="card-label small">Total Supplier</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
						<div class="card-title">
								<b>Pendapatan Setiap Hari</b>
							</div>
							<div class="row p-3">
								<div class="col-md-3">
									<div class="btn btn-success"><i class="fa fa-dollar-sign fa-2x p-2"></i></div>
								</div>
								<div class="col-md-9">
									<table>
										<tr>
											<td>Harian</td>
										</tr>
										<tr>
											<td><h5>Rp340.000</h5></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<canvas id="perbulan" height="130"></canvas>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<div class="btn btn-success"><i class="fa fa-dollar-sign fa-2x p-2"></i></div>
								</div>
								<div class="col-md-9">
									<table>
										<tr>
											<td>Pendapatan per bulan</td>
										</tr>
										<tr>
											<td><h5>Rp340.000</h5></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?= $this->EndSection(); ?>