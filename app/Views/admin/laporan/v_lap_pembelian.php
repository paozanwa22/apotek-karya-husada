<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="section-header-back">
				<a href="<?= base_url('/laporan/laporan'); ?>"><div class="btn btn-icon"><i class="fas fa-arrow-left"></i> </div></a>
			</div>
			<h1>Laporan Pembelian</h1>
		</div>

		<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
					<h4>Laporan Pembelian</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<label>Dari tanggal</label>
								<input type="date" name="tanggal_mulai" class="form-control">
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label>Sampai tanggal</label>
								<div class="input-group">
									<input type="date" name="tanggal_akhir" class="form-control">
									<div class="input-group-append">
									<button class="btn btn-success" type="button"><i class="fa fa-search"></i> Cari</button>
									</div>
								</div>
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