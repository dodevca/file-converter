<?= $this->extend('layouts/app') ?>

<?= $this->section('main') ?>
<section class="jumbotron bg-white py-5">
	<div class="container py-5 my-5">
		<h1 class="h4 fw-bold text-secondary text-center"><?= $meta->name == 'home' ? 'File' : ucwords($meta->name) ?> Converter</h1>
		<h2 class="h3 text-center">Konversikan File <?= $meta->name == 'home' ? 'ke Format Apapun' : ucwords($meta->name) . ' Dengan Mudah' ?></h2>
		<div class="card border-0 shadow-lg mt-4 mb-5 rounded-3">
			<div class="card-body p-lg-5">
				<div id="drop-area" class="text-center">
					<input type="file" id="file-input" style="display: none;" accept="<?= $contents->file->accept != null ? join(', ', $contents->file->accept) : '*' ?>" multiple>
					<button type="button" class="btn btn-secondary px-4 py-3" id="browse-button">
						<i class="bi bi-file-earmark-plus-fill me-2"></i>Pilih file
					</button>
					<div class="divider position-relative my-2">
						<span class="position-relative text-muted small bg-white p-2 z-2">atau</span>
					</div>
					<p class="text-muted">letakkan file di sini</p>
				</div>
				<div id="file-area" style="display: none;">
					<button type="button" class="btn btn-outline-secondary" id="add-button">
						<i class="bi bi-file-earmark-plus-fill me-2"></i>Tambah file
					</button>
					<ul id="file-list" class="list-group mt-3"></ul>
					<div class="d-flex align-items-center justify-content-between">
						<p class="text-muted m-0">
							<span>0</span> file diunggah
						</p>
						<button type="button" class="btn btn-secondary" id="convert-button" disabled>Konversi <i class="bi bi-arrow-repeat ms-2"></i>
						</button>
					</div>
				</div>
				<div id="loading" style="display: none;">
					<div class="d-flex justify-content-center">
						<div class="spinner-border text-primary" role="status">
							<span class="visually-hidden">Loading...</span>
						</div>
					</div>
				</div>
				<div id="download-area" style="display: none;"></div>
			</div>
		</div>
	</div>
</section>
<section class="bg-primary text-white">
	<div class="container py-5">
		<div class="row text-center">
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-arrow-repeat fs-1 text-secondary"></i>
				<h3 class="h5">300+ Format Didukung</h3>
				<p class="text-tertiary m-0">Kami mendukung lebih dari 25.600 konversi berbeda antara lebih dari 300 format file berbeda. Lebih dari konverter lainnya.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-star fs-1 text-secondary"></i>
				<h3 class="h5">Cepat dan mudah</h3>
				<p class="text-tertiary m-0">Letakkan saja file Anda di halaman, pilih format keluaran dan klik tombol "Konversi". Tunggu sebentar hingga prosesnya selesai. Kami bertujuan untuk melakukan semua konversi kami dalam waktu kurang dari 1-2 menit.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-cloud-arrow-up fs-1 text-secondary"></i>
				<h3 class="h5">Penyimpanan di Cloud</h3>
				<p class="text-tertiary m-0">Semua konversi terjadi di cloud dan tidak akan menghabiskan kapasitas apa pun dari komputer Anda.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-gear fs-1 text-secondary"></i>
				<h3 class="h5">Pengaturan khusus</h3>
				<p class="text-tertiary m-0">Sebagian besar jenis konversi mendukung opsi lanjutan. Misalnya dengan konverter video Anda dapat memilih kualitas, rasio aspek, codec dan pengaturan lainnya, memutar dan membalik.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-check-circle fs-1 text-secondary"></i>
				<h3 class="h5">Keamanan terjamin</h3>
				<p class="text-tertiary m-0">Kami menghapus file yang diunggah secara instan dan file yang dikonversi setelah 24 jam. Tidak ada seorang pun yang memiliki akses ke file Anda dan privasi dijamin 100%. Baca lebih lanjut tentang keamanan.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-display fs-1 text-secondary"></i>
				<h3 class="h5">Semua perangkat didukung </h3>
				<p class="text-tertiary m-0">Convertio berbasis browser dan berfungsi untuk semua platform. Tidak perlu mengunduh dan menginstal perangkat lunak apa pun. </p>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('js/file.js') ?>" type="text/javascript"></script>
<?= $this->endSection() ?>