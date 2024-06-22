<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<section class="jumbotron bg-white py-5">
	<div class="container py-5 my-5">
		<h1 class="h4 fw-bold text-secondary text-center"><?= $meta->name == 'home' ? 'File' : ucwords($meta->name) ?> Converter</h1>
		<h2 class="h3 text-center">Konversikan File <?= $meta->name == 'home' ? 'ke Format Apapun' : ucwords($meta->name) . ' Dengan Mudah' ?></h2>
		<div class="card border-0 shadow-lg mt-4 mb-5 rounded-3">
			<div class="card-body p-lg-5">
				<div id="drop-area" class="text-center">
					<input type="file" id="file-input" style="display: none;" multiple>
					<button type="button" class="btn btn-secondary px-4 py-3" id="browse-button">
						<i class="bi bi-file-earmark-plus-fill me-2"></i>Pilih file
					</button>
					<div class="divider position-relative my-2">
						<span class="position-relative text-muted small bg-white p-2 z-2">atau</span>
					</div>
					<p class="mb-4">seret dan letakkan file di sini</p>
					<?php if(empty($user->subscription)): ?>
						<div class="alert alert-warning text-center fade show" role="alert">
							Maksimum ukuran 100 MB. <a href="/pricing"><strong>Berlangganan</strong></a> untuk mendapatkan lebih.
						</div>
					<?php else: ?>
						<p class="small text-muted mb-0">Maksimum ukuran <?= $user->package->ukuran_maks / 1000000000 ?> GB<?= $user->package->id < 4 ? '. <a href="/pricing"><strong>Upgrade</strong></a> untuk mendapatkan lebih.</p>' : '' ?>
					<?php endif; ?>
				</div>
				<div id="file-area" style="display: none;">
					<button type="button" class="btn btn-outline-secondary" id="add-button">
						<i class="bi bi-file-earmark-plus-fill me-2"></i>Tambah file
					</button>
					<ul id="file-list" class="list-group mt-3"></ul>
					<div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
						<p class="text-muted small m-0">
							<span>0</span> file diunggah
						</p>
						<div class="d-flex align-items-center justify-content-end gap-2 ms-auto">
							<?php if($user->subscription): ?>
								<p class="small m-0">
									<?= $user->subscription->menit ?> / <?= $user->package->menit_maks ?> menit
								</p>
							<?php endif; ?>
							<button type="button" class="btn btn-secondary" id="convert-button" disabled>Konversi <i class="bi bi-arrow-repeat ms-2"></i>
							</button>
						</div>
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
				<h5>300+ Format Didukung</h5>
				<p class="text-tertiary m-0">Kami mendukung lebih dari 25.600 konversi berbeda antara lebih dari 300 format file berbeda. Lebih dari konverter lainnya.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-star fs-1 text-secondary"></i>
				<h5>Cepat dan mudah</h5>
				<p class="text-tertiary m-0">Letakkan saja file Anda di halaman, pilih format keluaran dan klik tombol "Konversi". Tunggu sebentar hingga prosesnya selesai. Kami bertujuan untuk melakukan semua konversi kami dalam waktu kurang dari 1-2 menit.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-cloud-arrow-up fs-1 text-secondary"></i>
				<h5>Penyimpanan di Cloud</h5>
				<p class="text-tertiary m-0">Semua konversi terjadi di cloud dan tidak akan menghabiskan kapasitas apa pun dari komputer Anda.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-gear fs-1 text-secondary"></i>
				<h5>Pengaturan khusus</h5>
				<p class="text-tertiary m-0">Sebagian besar jenis konversi mendukung opsi lanjutan. Misalnya dengan konverter video Anda dapat memilih kualitas, rasio aspek, codec dan pengaturan lainnya, memutar dan membalik.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-check-circle fs-1 text-secondary"></i>
				<h5>Keamanan terjamin</h5>
				<p class="text-tertiary m-0">Kami menghapus file yang diunggah secara instan dan file yang dikonversi setelah 24 jam. Tidak ada seorang pun yang memiliki akses ke file Anda dan privasi dijamin 100%. Baca lebih lanjut tentang keamanan.</p>
			</div>
			<div class="col-md-6 col-lg-4 p-3 mb-4">
				<i class="bi bi-display fs-1 text-secondary"></i>
				<h5>Semua perangkat didukung </h5>
				<p class="text-tertiary m-0">Convertio berbasis browser dan berfungsi untuk semua platform. Tidak perlu mengunduh dan menginstal perangkat lunak apa pun. </p>
			</div>
		</div>
	</div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', (event) => {
	// initial elements
    const dropArea		= document.getElementById('drop-area')
	const fileArea 	    = document.getElementById('file-area')
	const downloadArea	= document.getElementById('download-area')
	const loading		= document.getElementById('loading')
	const fileInput		= document.getElementById('file-input')
	const fileList		= document.getElementById('file-list')
	const fileCounter	= document.querySelector('.text-muted span')
    const addBtn        = document.getElementById('add-button')
    const browseBtn     = document.getElementById('browse-button')
	const convertBtn	= document.getElementById('convert-button')
	let allFiles		= []

    // functions
    const preventDefaults = (e) => {
		e.preventDefault()
		e.stopPropagation()
	}

    const fileListToggle = () => {
		if(fileList.children.length > 0) {
			dropArea.style.display  = 'none'
			fileArea.style.display  = 'block'
		} else {
			dropArea.style.display 	= 'block'
			fileArea.style.display  = 'none'
		}
	}

    const convertButtonToggle = () => {
		const selects   = document.querySelectorAll('.file-output select')
		const isSelect  = Array.from(selects).every(select => select.value !== '...')

		convertBtn.disabled = !isSelect
	}

    const getFormat = (filename) => {
		const dotIndex = filename.lastIndexOf('.')

		if(dotIndex !== -1) return filename.substring(dotIndex + 1).toLowerCase()
		    return ''
	}

    const getFormatList = (source, container, badge) => {
		fetch('/convert/option?i=' + source)
		.then(response => response.json())
		.then(data => {
			container.insertAdjacentHTML('beforeend', '<p class="text-muted small m-0">Output:</p><select class="form-select" aria-label="Output"><option selected>...</option></select>')
			
			const selectElement = container.querySelector('select')

			data.responses.forEach(format => {
				const option        = document.createElement('option')
				option.value        = format
				option.textContent  = format.toUpperCase()

				selectElement.appendChild(option)
			})

			selectElement.addEventListener('change', convertButtonToggle)

			badge.classList.remove('text-bg-warning')
			badge.classList.add('text-bg-success')
			badge.textContent = 'berhasil'
		})
		.catch(error => {
			console.error('Error getting file formats:', error)
		})
	}

    const countFile = () => {
		const fileCount         = fileList.children.length
		fileCounter.textContent = fileCount
	}

    const showFile = (file) => {
		return new Promise((resolve, reject) => {
			const reader = new FileReader()

			reader.readAsDataURL(file)
			reader.onloadend = () => {
				const li = document.createElement('li')
				li.classList.add('file-wrapper', 'd-flex', 'flex-wrap', 'flex-md-nowrap', 'align-items-center', 'border', 'rounded-3', 'gap-3', 'p-3', 'mb-3')

				const fileDetails       = document.createElement('div')
				fileDetails.innerHTML   = `<i class="bi bi-file-arrow-up-fill fs-4 text-muted"></i><p class="m-0">${file.name}</p>`
				fileDetails.classList.add('file-name', 'd-flex', 'align-items-center', 'justify-content-start', 'me-auto', 'gap-2', 'order-1')

				const fileSize          = document.createElement('p')
				fileSize.textContent    = `${(file.size / 1000000).toFixed(2)} MB`
				fileSize.classList.add('text-muted', 'small', 'text-nowrap', 'm-0', 'order-2')

				const outputSelectContainer = document.createElement('div')
				outputSelectContainer.classList.add('d-flex', 'align-items-center', 'gap-2')

				const statusBadge       = document.createElement('span')
				statusBadge.textContent = 'mengunggah'
				statusBadge.classList.add('badge', 'small', 'bg-opacity-75', 'text-bg-warning')

				const outputSelectWrapper = document.createElement('div')
				outputSelectWrapper.classList.add('file-output', 'd-flex', 'align-items-center', 'justify-content-between', 'gap-3', 'order-4', 'order-md-3')
				outputSelectWrapper.appendChild(outputSelectContainer)
				outputSelectWrapper.appendChild(statusBadge)

				getFormatList(getFormat(file.name), outputSelectContainer, statusBadge)

				const removeLink        = document.createElement('a')
				removeLink.href         = '#'
				removeLink.innerHTML    = '<i class="bi bi-x-circle opacity-75"></i>'
				removeLink.classList.add('text-danger', 'order-3', 'order-md-4')
				removeLink.addEventListener('click', () => {
					const index = allFiles.indexOf(file)

                    if(index > -1)
                        allFiles.splice(index, 1)

					li.remove()
					countFile()
					fileListToggle()
					convertButtonToggle()
				})

				li.appendChild(fileDetails)
				li.appendChild(fileSize)
				li.appendChild(outputSelectWrapper)
				li.appendChild(removeLink)

				fileList.appendChild(li)

				resolve()
			}
			reader.onerror = () => {
				reject(reader.error)
			}
		})
	}

	const handleDrop = (e) =>  {
		const dt    = e.dataTransfer
		const files	= dt.files

		handleFiles(files)
	}

	const handleFiles = async(files) => {
		const filesArray 		= Array.from(files)
		const currentFileCount	= fileList.children.length

		if(currentFileCount + filesArray.length > parseInt('<?= $user->subscription ? $user->package->konversi : 5 ?>')) {
			let excessFiles	= (currentFileCount + filesArray.length) - parseInt('<?= $user->subscription ? $user->package->konversi : 5 ?>')
			let alertHTML	= `
				<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
					Anda tidak dapat mengkonversi lebih dari <?= $user->subscription ? $user->package->konversi : 5 ?> file bersamaan. <a href="/pricing"><strong>Berlangganan</strong></a> untuk mendapatkan lebih.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			`

			dropArea.insertAdjacentHTML('afterbegin', alertHTML)
			fileArea.insertAdjacentHTML('afterbegin', alertHTML)
			filesArray.splice(parseInt('<?= $user->subscription ? $user->package->konversi : 5 ?>') - currentFileCount, excessFiles)
		}

		const previewPromises = []

		filesArray.forEach(f => {
			if(f.size > parseInt('<?= $user->subscription ? $user->package->ukuran_maks : 100000000 ?>')) {
				let alertHTML = `
					<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
						<strong>Batas maksimum ukuran terlampaui!</strong> File ${f.name} melebihi <?= $user->subscription ? $user->package->ukuran_maks / 1000000000 . ' GB' : 100 . ' MB' ?>.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`

				dropArea.insertAdjacentHTML('afterbegin', alertHTML)
				fileArea.insertAdjacentHTML('afterbegin', alertHTML)
			} else {
                allFiles.push(f)
				previewPromises.push(showFile(f))
			}
		})
		
		await Promise.all(previewPromises)

		countFile()
		fileListToggle()
	}

    const handleSubmit = () => {
        const form 			= new FormData()
		convertBtn.disabled = true

		if(sessionStorage.convertCount)
			sessionStorage.convertCount = Number(sessionStorage.convertCount) + 1
		else
			sessionStorage.convertCount = 1
		

		<?php if(!$user->subscription): ?>
			if(sessionStorage.convertCount >= 3) {
				let alertHTML = `
					<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
						Anda terlalu banyak melakukan konversi. <a href="/pricing"><strong>Berlangganan</strong></a> untuk mendapatkan lebih.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`

				fileArea.insertAdjacentHTML('afterbegin', alertHTML)
			}
		<?php endif; ?>

		if(sessionStorage.convertCount <= 3) {
			fileArea.style.display	= 'none'
			loading.style.display 	= 'block'

			allFiles.forEach((e, i) => {
				const fileOutput = fileList.children[i].querySelector('.file-output select').value

				form.append('files[]', e)
				form.append('formats[]', fileOutput)
			})

			fetch('/convert', {
				method: 'POST',
				body: form
			})
			.then(response => response.json())
			.then(data => {
				if(data.status == 200 || data.status == '200') {
					downloadArea.innerHTML = `
						<h3 class="h5 text-center mb-4">File Anda telah selesai dikonversi</h5>
						<div class="d-flex align-items-center justify-content-center gap-3">
							<button type="button" class="btn btn-outline-secondary rounded-circle px-2 py-1" onclick="location.reload()">
								<i class="bi bi-chevron-compact-left"></i>
							</button>
							<a href="${data.responses}" class="btn btn-secondary px-4 py-3" id="download-button">
								Download file
							</a>
						</div>
					`
				} else {
					downloadArea.innerHTML = `
						<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
							<strong>Error: </strong> ${data.message}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					`
				}

				console.log(data)

				loading.style.display = 'none'
				downloadArea.style.display = 'block'
			})
			.catch(error => {
				console.log(error)
			})
		}
    }

    // drag and drop events
	['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
		dropArea.addEventListener(event, preventDefaults, false)
		document.body.addEventListener(event, preventDefaults, false)
	})

	dropArea.addEventListener('drop', handleDrop, false)

    // add files events
	browseBtn.addEventListener('click', () => {
		fileInput.click()
	})

	addBtn.addEventListener('click', () => {
		fileInput.click()
	})

	fileInput.addEventListener('change', (e) => {
		handleFiles(e.target.files)
	})

	convertBtn.addEventListener('click', (e) => {
		e.preventDefault()
		
		<?php if($user->subscription): ?>
			<?php if($user->subscription->menit > 0): ?>
	        	handleSubmit()
			<?php endif; ?>
		<?php else: ?>
	        handleSubmit()
		<?php endif; ?>
	})
})
</script>
<?= $this->endSection() ?>