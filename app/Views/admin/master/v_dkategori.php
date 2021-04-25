<?= $this->extend('layout/v_template'); ?>
<?= $this->section('isi');?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Kategori Obat</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/admin">Beranda</a></div>
                <div class="breadcrumb-item">Data Kategori</div>
            </div>
		</div>

		<div class="section-body">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url(); ?>/admin/tkategori" class="btn btn-success"><i class="fa fa-plus"></i> Kategori</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped responsive nowrap table-hover" width="100%" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>Umum</td>
                                        <td width="37px">
                                            <a href="<?= base_url() ?>/admin/ukategori" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                                            <a href="<?= base_url() ?>/admin/hkategori" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keras</td>
                                        <td>
                                            <a href="<?= base_url() ?>/admin/ukategori" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                                            <a href="<?= base_url() ?>/admin/hkategori" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Narkotika</td>
                                        <td>
                                            <a href="<?= base_url() ?>/admin/ukategori" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"> Ubah</i></a>
                                            <a href="<?= base_url() ?>/admin/hkategori" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- card-body-->
                    </div><!--card-->
                </div><!--col-->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="satuan">Kategori</label>
                                    <input type="text" name="kategori" class="form-control">
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Tambah</button>
                                <a href="<?= base_url('admin/dkategori'); ?>" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div><!--col-md-5-->
            </div><!--row-->
		</div><!--section-body-->
	</section>
</div>
<?= $this->endSection(); ?>