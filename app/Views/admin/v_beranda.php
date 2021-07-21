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
										<h4><?= $count_obat; ?></h4>
										<div class="card-label small">Total Obat</div>
									</div>
									<div class="col-md-6 text-center">
										<h4><?= $count_supplier; ?></h4>
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
								<b>Pendapatan Hari Ini</b>
							</div>
							<div class="row p-3">
								<div class="col-md-3">
									<div class="btn btn-success"><i class="fa fa-dollar-sign fa-2x p-2"></i></div>
								</div>
								<div class="col-md-9">
									<table>
										<?php
										$db = \Config\Database::connect();
										// $tgl = date('Y-m-d', time() + 60 * 60 * 13);
										// $data = $db->query("SELECT * FROM tb_penjualan WHERE tgl_jual = $tgl");
										$data = $db->query("SELECT SUM(total) AS total_bayar FROM tb_penjualan WHERE tgl_jual=CURDATE()");
										$ambil = $data->getResult();
										// dd($ambil);
										$pendapatan = 0;
										foreach ($ambil as $d) {
											// dd($d);
											$pendapatan += $d->total_bayar;
										}
										$total_pendapatan = 0;

										$pendapatanPerBulan = $db->query("SELECT * FROM tb_penjualan WHERE MONTH(tgl_jual) = MONTH(NOW()) and YEAR(tgl_jual) = YEAR(NOW())");
										$bulanan = $pendapatanPerBulan->getResultArray();
										foreach ($bulanan as $p) {
											$total_pendapatan += $p['total'];
										}
										// dd($total_pendapatan);
										?>
										<tr>
											<td>Harian</td>
										</tr>
										<tr>
											<td>
												<h5>Rp<?= number_format($pendapatan) ?></h5>
											</td>
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
											<td>Pendapatan Bulan Ini</td>
										</tr>
										<tr>
											<td>
												<h5>Rp<?= number_format($total_pendapatan); ?></h5>
											</td>
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