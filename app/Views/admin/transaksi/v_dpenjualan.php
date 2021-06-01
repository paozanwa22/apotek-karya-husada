<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Histori Penjualan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
				<div class="breadcrumb-item">Histori Transaksi</div>
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
										<th>Apoteker</th>
										<th>Tanggal Pembelian</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($dpenjualan as $d) { ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $d['nama'] ?></td>
											<td><?= $d['tgl_beli'] ?></td>
											<td>
												<a href="<?= base_url('/admin/detailpenjualan/' . $d['id_invoice']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</a>
												<a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
											</td>
										</tr>
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

<?= $this->endSection(); ?>