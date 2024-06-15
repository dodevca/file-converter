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
					<div class="btn-group">
						<button type="button" class="btn btn-secondary px-4 py-3" id="browse-button">
							<i class="bi bi-file-earmark-plus-fill me-2"></i>Pilih file </button>
						<button type="button" class="btn btn-secondary px-3 dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="visually-hidden">Lainnya</span>
						</button>
						<ul class="dropdown-menu border-0 bg-secondary dropdown-menu-end">
							<li>
								<a class="dropdown-item text-white" href="#">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" class="me-2" fill="#fff" viewBox="0 0 50 50">
										<path d="M45.58 31H32.61L19.73 6h10.754c.726 0 1.394.393 1.747 1.027L45.58 31zM23.37 17.43L9.94 43.2 3.482 33.04c-.395-.622-.417-1.411-.055-2.053L17.48 6 23.37 17.43zM45.54 33l-6.401 10.073C38.772 43.65 38.136 44 37.451 44H11.78l5.73-11H45.54z"></path>
									</svg>Google Drive
								</a>
							</li>
							<li>
								<a class="dropdown-item text-white" href="#">
									<i class="bi bi-dropbox me-2"></i>Dropbox
								</a>
							</li>
							<li>
								<a class="dropdown-item text-white" href="#">
									<i class="bi bi-link-45deg me-2"></i>URL
								</a>
							</li>
						</ul>
					</div>
					<div class="divider position-relative my-2">
						<span class="position-relative text-muted small bg-white p-2 z-2">atau</span>
					</div>
					<p class="text-muted">letakkan file di sini</p>
				</div>
				<div id="file-area" style="display: none;">
					<div class="btn-group">
						<button type="button" class="btn btn-outline-secondary" id="add-button">
							<i class="bi bi-file-earmark-plus-fill me-2"></i>Tambah file </button>
						<button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="visually-hidden">Lainnya</span>
						</button>
						<ul class="dropdown-menu border-0 bg-secondary dropdown-menu-end">
							<li>
								<a class="dropdown-item text-white" href="#">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" class="me-2" fill="#fff" viewBox="0 0 50 50">
										<path d="M45.58 31H32.61L19.73 6h10.754c.726 0 1.394.393 1.747 1.027L45.58 31zM23.37 17.43L9.94 43.2 3.482 33.04c-.395-.622-.417-1.411-.055-2.053L17.48 6 23.37 17.43zM45.54 33l-6.401 10.073C38.772 43.65 38.136 44 37.451 44H11.78l5.73-11H45.54z"></path>
									</svg>Google Drive
								</a>
							</li>
							<li>
								<a class="dropdown-item text-white" href="#">
									<i class="bi bi-dropbox me-2"></i>Dropbox
								</a>
							</li>
							<li>
								<a class="dropdown-item text-white" href="#">
									<i class="bi bi-link-45deg me-2"></i>URL
								</a>
							</li>
						</ul>
					</div>
					<ul id="file-list" class="list-group mt-3"></ul>
					<div class="d-flex align-items-center justify-content-between">
						<p class="text-muted m-0">
							<span>0</span> file diunggah
						</p>
						<button type="button" class="btn btn-secondary" id="convert-button" disabled>Konversi <i class="bi bi-arrow-repeat ms-2"></i>
						</button>
					</div>
				</div>
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
	const dropArea		= document.getElementById('drop-area');
	const fileInput		= document.getElementById('file-input');
	const fileList		= document.getElementById('file-list');
	const fileCounter	= document.querySelector('.text-muted span');
	const filesArea 	= document.getElementById('file-area');
	const convertBtn	= document.getElementById('convert-button');

	['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
		dropArea.addEventListener(eventName, preventDefaults, false);
		document.body.addEventListener(eventName, preventDefaults, false);
	});

	['dragenter', 'dragover'].forEach(eventName => {
		dropArea.addEventListener(eventName, highlight, false);
	});

	['dragleave', 'drop'].forEach(eventName => {
		dropArea.addEventListener(eventName, unhighlight, false);
	});

	dropArea.addEventListener('drop', handleDrop, false);

	document.getElementById('browse-button').addEventListener('click', () => {
		fileInput.click();
	});

	document.getElementById('add-button').addEventListener('click', () => {
		fileInput.click();
	});

	fileInput.addEventListener('change', function(e) {
		handleFiles(e.target.files);
	});

	function preventDefaults(e) {
		e.preventDefault();
		e.stopPropagation();
	}

	function highlight() {
		dropArea.classList.add('highlight');
	}

	function unhighlight() {
		dropArea.classList.remove('highlight');
	}

	function handleDrop(e) {
		const dt	= e.dataTransfer;
		const files	= dt.files;

		handleFiles(files);
	}

	async function handleFiles(files) {
		const filesArray 		= Array.from(files);
		const currentFileCount	= fileList.children.length;

		if(currentFileCount + filesArray.length > 5) {
			let excessFiles	= (currentFileCount + filesArray.length) - 5;
			let alertHTML	= `
				<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
					Anda tidak dapat mengkonversi lebih dari 5 file bersamaan. <a href="<?= base_url('pricing') ?>" class="text-dark"><strong>Berlangganan</strong></a> untuk mendapatkan lebih.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			`;

			dropArea.insertAdjacentHTML('afterbegin', alertHTML);
			filesArea.insertAdjacentHTML('afterbegin', alertHTML);
			filesArray.splice(5 - currentFileCount, excessFiles);
		}

		const previewPromises = [];

		filesArray.forEach(file => {
			if(file.size > 100 * 1024 * 1024) {
				let alertHTML = `
					<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
						<strong>Batas Ukuran File Terlampaui!</strong> File convy.dodevca.com.zip melebihi ukuran maksimum yang diizinkan yaitu 100MB.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`;

				dropArea.insertAdjacentHTML('afterbegin', alertHTML);
				filesArea.insertAdjacentHTML('afterbegin', alertHTML);
			} else {
				previewPromises.push(previewFile(file));
			}
		});
		
		await Promise.all(previewPromises);

		updateFileCounter();
		toggleVisibility();
	}

	function previewFile(file) {
		return new Promise((resolve, reject) => {
			const reader = new FileReader();

			reader.readAsDataURL(file);
			reader.onloadend = () => {
				const li = document.createElement('li');
				li.classList.add('file-wrapper', 'd-flex', 'flex-wrap', 'flex-md-nowrap', 'align-items-center', 'border', 'rounded-3', 'gap-3', 'p-3', 'mb-3');

				const fileDetails = document.createElement('div');
				fileDetails.classList.add('file-name', 'd-flex', 'align-items-center', 'justify-content-start', 'me-auto', 'gap-2', 'order-1');
				fileDetails.innerHTML = `<i class="bi bi-file-arrow-up-fill fs-4 text-muted"></i>
                                          <p class="m-0">${file.name}</p>`;

				const fileSize = document.createElement('p');
				fileSize.classList.add('text-muted', 'small', 'text-nowrap', 'm-0', 'order-2');
				fileSize.textContent = `${Math.round(file.size / 1024)} KB`;

				const outputSelectContainer = document.createElement('div');
				outputSelectContainer.classList.add('d-flex', 'align-items-center', 'gap-2');

				const outputSelectWrapper = document.createElement('div');
				outputSelectWrapper.classList.add('file-output', 'd-flex', 'align-items-center', 'justify-content-between', 'gap-3', 'order-4', 'order-md-3');
				outputSelectWrapper.appendChild(outputSelectContainer);

				const statusBadge = document.createElement('span');
				statusBadge.classList.add('badge', 'small', 'bg-opacity-75', 'text-bg-warning');
				statusBadge.textContent = 'mengunggah';

				outputSelectWrapper.appendChild(statusBadge);

				getDestinationFileFormats(getFileFormat(file.name), outputSelectContainer, statusBadge);

				const removeLink = document.createElement('a');
				removeLink.href = '#';
				removeLink.classList.add('text-danger', 'order-3', 'order-md-4');
				removeLink.innerHTML = '<i class="bi bi-x-circle opacity-75"></i>';
				removeLink.addEventListener('click', () => {
					li.remove();
					updateFileCounter();
					toggleVisibility();
					checkAllSelectsChosen();
				});

				li.appendChild(fileDetails);
				li.appendChild(fileSize);
				li.appendChild(outputSelectWrapper);
				li.appendChild(removeLink);
				fileList.appendChild(li);

				resolve();
			};
			reader.onerror = () => {
				reject(reader.error);
			};
		});
	}

	function updateFileCounter() {
		const fileCount = fileList.children.length;
		fileCounter.textContent = fileCount;
	}

	function toggleVisibility() {
		if(fileList.children.length > 0) {
			dropArea.style.display 	= 'none';
			filesArea.style.display = 'block';
		} else {
			dropArea.style.display 	= 'block';
			filesArea.style.display = 'none';
		}
	}

	function getFileFormat(filename) {
		const dotIndex = filename.lastIndexOf('.');
		if(dotIndex !== -1) return filename.substring(dotIndex + 1).toLowerCase();
		return '';
	}

	function getDestinationFileFormats(sourceFormat, outputSelectContainer, statusBadge) {
		fetch('/option?i=' + sourceFormat)
		.then(response => response.json())
		.then(data => {
			outputSelectContainer.insertAdjacentHTML('beforeend', '<p class="text-muted small m-0">Output:</p><select class="form-select" aria-label="Output"><option selected>...</option></select>');
			
			const selectElement = outputSelectContainer.querySelector('select');

			data.forEach(format => {
				const option = document.createElement('option');
				option.value = format;
				option.textContent = format.toUpperCase();

				selectElement.appendChild(option);
			});

			selectElement.addEventListener('change', checkAllSelectsChosen);
			statusBadge.classList.remove('text-bg-warning');
			statusBadge.classList.add('text-bg-success');
			statusBadge.textContent = 'berhasil';
		})
		.catch(error => {
			console.error('Error fetching file formats:', error);
		});
	}

	
	function checkAllSelectsChosen() {
		const allSelects	= document.querySelectorAll('.file-output select');
		const allChosen		= Array.from(allSelects).every(select => select.value !== '...');

		if(allChosen) {
			convertBtn.removeAttribute('disabled');
		} else {
			convertBtn.setAttribute('disabled', 'disabled');
		}
	}
});
</script>
<?= $this->endSection() ?>