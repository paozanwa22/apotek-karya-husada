<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="<?= base_url('/laporan/laporan'); ?>">
					<div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div>
				</a>
			</div>
			<h1>Laporan Stok Obat</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Laporan Stok Obat</h4>
						</div>
						<div class="card-body">
							<a href="<?= base_url('/laporan/cetak_obat'); ?>" class="btn btn-light"><i class="fa fa-print"></i> Cetak</a><br><br>
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
	</section>
</div>
<?= $this->EndSection(); ?>