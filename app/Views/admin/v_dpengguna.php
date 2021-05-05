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
                  <a href="<?= base_url() ?>/admin/tpengguna" class="btn btn-success"><i class="fa fa-plus"></i> Pengguna</a>
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
                            <th>Level</th>
                            <th>Poto</th>
                            <th>Alamat</th>
                            <th>Tgl Buat</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no=1;
                        foreach($data as $d){
                        ?>

                          <tr>
                            <td><?=$no++;?></td>
                            <td><?=$d['nama'];?></td>
                            <td><?=$d['email'];?></td>
                            <td><?=$d['jk'];?></td>
                            <td><?=$d['no_tlp'];?></td>
                            <td><?=$d['level'];?></td>
                            <td><img src="<?= base_url('/gambar/'.$d['poto']); ?>" width="50px" class="rounded-circle" alt="Foto"></td>
                            <td><?=$d['alamat'];?></td>
                            <td><?=$d['tgl_buat'];?></td>
                            <td>
                              <a href="<?= base_url() ?>/admin/upengguna/<?=$d['id_pengguna']?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                              <a href="<?= base_url() ?>/admin/hpengguna/<?=$d['id_pengguna']?>" class="btn btn-danger btn-sm hapus-data"><i class="fa fa-trash"> Hapus</i></a>
                            </td>
                          </tr>

                          <?php
                          }
                          ?>

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