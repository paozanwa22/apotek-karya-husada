<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan</h1>
		</div>

		<div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>Laporan Penjualan</h5>
                        </div>
                        <div class="card-body">
                            <i class="fa fa-chart-line fa-3x"></i>
                            <div class="card-label">Data Laporan Penjualan</div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('/laporan/lap_penjualan'); ?>" class="btn btn-success">Lihat Laporan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>Laporan Pembelian</h5>
                        </div>
                        <div class="card-body">
                            <i class="fa fa-chart-bar fa-3x"></i>
                            <div class="card-label">Data Laporan Pembelian</div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('/laporan/lap_pembelian'); ?>" class="btn btn-primary">Lihat Laporan</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>Laporan Stok Obat</h5>
                        </div>
                        <div class="card-body">
                            <i class="fa fa-file-alt fa-3x"></i>
                            <div class="card-label">Data Laporan Stok Obat</div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('/laporan/lap_stok_obat'); ?>" class="btn btn-danger">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>
</div>
<?= $this->EndSection(); ?>