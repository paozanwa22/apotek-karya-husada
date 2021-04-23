<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi'); ?>

<style>
  .table > tbody > tr > td {
    vertical-align: middle;
  }
</style>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Pengguna</h1>
            <div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
                <div class="breadcrumb-item">Data Pengguna</a></div>
			</div>
		</div>

		<div class="section-body">
		<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <a href="<?= base_url() ?>/admin/tsupplier" class="btn btn-success"><i class="fa fa-plus"></i> Pengguna</a>
                  </div>
                  <div class="card-body">
                      <table class="table table-striped responsive nowrap table-hover" width="100%" id="myTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Poto</th>
                            <th>Tgl Buat</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Haikal</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td><img src="<?= base_url(); ?>/template/assets/img/avatar/avatar-1.png" width="50px" class="rounded-circle" alt="Foto"></td>
                            <td>0987654321123</td>
                            <td>
                              <a href="<?= base_url() ?>/admin/usupplier" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                              <a href="<?= base_url() ?>/admin/hsupplier" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Haikal</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td><img src="<?= base_url(); ?>/template/assets/img/avatar/avatar-1.png" width="50px" class="rounded-circle" alt="Foto"></td>
                            <td>0987654321123</td>
                            <td>
                              <a href="<?= base_url() ?>/admin/usupplier" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                              <a href="<?= base_url() ?>/admin/hsupplier" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Haikal</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td>Masbagik</td>
                            <td><img src="<?= base_url(); ?>/template/assets/img/avatar/avatar-1.png" width="50px" class="rounded-circle" alt="Foto"></td>
                            <td>0987654321123</td>
                            <td>
                              <a href="<?= base_url() ?>/admin/usupplier" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                              <a href="<?= base_url() ?>/admin/hsupplier" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
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