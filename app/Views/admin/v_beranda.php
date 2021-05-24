<?= $this->extend("layout/v_template"); ?>

<?= $this->section("isi"); ?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Beranda</h1>
		</div>

		<div class="section-body">
		<?= session()->get('id_pengguna'); ?>
		<?= session()->get('nama'); ?>
		<?= session()->get('level'); ?>
		<?= session()->get('log_in'); ?>
		</div>
	</section>
</div>
<?= $this->EndSection(); ?>