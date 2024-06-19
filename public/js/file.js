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
		fetch('/option?i=' + source)
		.then(response => response.json())
		.then(data => {
			container.insertAdjacentHTML('beforeend', '<p class="text-muted small m-0">Output:</p><select class="form-select" aria-label="Output"><option selected>...</option></select>')
			
			const selectElement = container.querySelector('select')

			data.forEach(format => {
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
				fileSize.textContent    = `${Math.round(file.size / 1024)} KB`
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

		if(currentFileCount + filesArray.length > 5) {
			let excessFiles	= (currentFileCount + filesArray.length) - 5
			let alertHTML	= `
				<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
					Anda tidak dapat mengkonversi lebih dari 5 file bersamaan. <a href="/pricing" class="text-dark"><strong>Berlangganan</strong></a> untuk mendapatkan lebih.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			`

			dropArea.insertAdjacentHTML('afterbegin', alertHTML)
			fileArea.insertAdjacentHTML('afterbegin', alertHTML)
			filesArray.splice(5 - currentFileCount, excessFiles)
		}

		const previewPromises = []

		filesArray.forEach(f => {
			if(f.size > 100 * 1024 * 1024) {
				let alertHTML = `
					<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
						<strong>Batas Ukuran File Terlampaui!</strong> File convy.dodevca.com.zip melebihi ukuran maksimum yang diizinkan yaitu 100MB.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`

				dropArea.insertAdjacentHTML('afterbegin', alertHTML)
				fileArea.insertAdjacentHTML('afterbegin', alertHTML)
			} else {
				previewPromises.push(showFile(f))
			}
		})
		
		await Promise.all(previewPromises)

		countFile()
		fileListToggle()
	}

    const handleSubmit = () => {
        const form = new FormData()

		convertBtn.disabled = true
		fileArea.style.display = 'none'
		loading.style.display = 'block'
        document.querySelectorAll('.file-wrapper').forEach((e, i) => {
			const fileOutput = e.querySelector('.file-output select').value

			form.append('files[]', fileInput.files[i])
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
					<h3 class="h5 text-center mb-4">File anda telah selesai dikonversi</h3>
					<div class="d-flex align-items-center justify-content-center gap-3">
						<button type="button" class="btn btn-outline-secondary rounded-circle px-2 py-1" onclick="location.reload();">
							<i class="bi bi-chevron-compact-left"></i>
						</button>
						<a href="${data.responses}" class="btn btn-secondary px-4 py-3" id="download-button">
							Download file
						</a>
					</div>
				`;
			} else {
				downloadArea.innerHTML = `
					<div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
						<strong>Error: </strong> ${data.responses}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`;
			}

			console.log(data)

			loading.style.display = 'none'
			downloadArea.style.display = 'block';
		})
		.catch(error => {
			console.log(error)
		})
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

        handleSubmit()
	})
})