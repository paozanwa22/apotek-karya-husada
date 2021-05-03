<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Suplayer</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Data Supplier</a></div>
			</div>
		</div>

		<div class="section-body">
		<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <a href="<?= base_url() ?>/admin/tsupplier" class="btn btn-success"><i class="fa fa-plus"></i> Suplayer</a>
                  </div>
                  <div class="card-body">
                      <table class="table table-striped responsive nowrap table-hover" width="100%" id="myTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=1;
                            foreach($data as $d){
                          ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['no_tlp']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td>
                              <a href="<?= base_url() ?>/admin/usupplier" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                              <a href="<?= base_url() ?>/admin/hsupplier" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
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