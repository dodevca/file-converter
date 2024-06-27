<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container py-5">
	<div class="row px-lg-3" id="payment-wrapper">
		<div class="col-12" id="payment-alert">
		</div>
		<div class="col-md-5 col-lg-4 order-md-last">
			<h4 class="h5 text-primary mb-3">Pembayaran</h4>
			<ul class="list-group mb-3">
				<li class="list-group-item d-flex justify-content-between lh-sm">
					<div>
						<h6 class="my-0">Paket <?= ucwords($contents->package->nama) ?></h6>
						<small class="text-body-secondary">Bulanan</small>
					</div>
					<span class="text-body-secondary">Rp<?= number_format($contents->package->harga, 0, ',', '.') ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between lh-sm">
					<div>
						<h6 class="my-0">Pajak (PPN)</h6>
						<small class="text-body-secondary">11%</small>
					</div>
					<span class="text-body-secondary">Rp<?= number_format($contents->tax, 0, ',', '.') ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between">
					<span>Total</span>
					<strong>Rp<?= number_format($contents->total, 0, ',', '.') ?></strong>
				</li>
			</ul>
		</div>
		<div class="col-md-7 col-lg-8">
			<h4 class="h5 mb-3">Alamat Penagihan</h4>
			<form id="payment-form" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-sm-6 mb-3">
						<label for="first-name" class="form-label">Nama Depan</label>
						<input type="text" class="form-control" id="first-name" name="first-name" placeholder="" value="<?= $contents->billing->nama_depan ?? '' ?>" required>
					</div>
					<div class="col-sm-6 mb-3">
						<label for="last-name" class="form-label">Nama Belakang</label>
						<input type="text" class="form-control" id="last-name" name="last-name" placeholder="" value="<?= $contents->billing->nama_belakang ?? '' ?>" required>
					</div>
					<div class="col-12 mb-3">
						<label for="phone" class="form-label">Telepon</label>
						<input type="phone" class="form-control" id="phone" name="phone" placeholder="" value="<?= $contents->billing->telepon ?? '' ?>" required="">
					</div>
					<div class="col-12 mb-3">
						<label for="address" class="form-label">Alamat</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="" value="<?= $contents->billing->alamat ?? '' ?>" required="">
					</div>
					<div class="col-md-5 mb-3">
						<label for="country" class="form-label">Negara</label>
						<select class="form-select" id="country" name="country" required>
							<?php foreach($contents->country as $c): ?>
								<option value="<?= $c->nama ?>" <?= $contents->billing->negara == $c->nama ? 'selected' : '' ?>><?= $c->nama ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-4 mb-3">
						<label for="city" class="form-label">Kota</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="" value="<?= $contents->billing->kota ?? '' ?>" required="">
					</div>
					<div class="col-md-3 mb-3">
						<label for="postcode" class="form-label">Kode POS</label>
						<input type="text" class="form-control" id="postcode" name="postcode" placeholder="" value="<?= $contents->billing->zip ?? '' ?>" required="">
						<input type="hidden" class="form-control" id="amount" name="amount" value="<?= $contents->total ?>" required>
					</div>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="save-info" value="save" <?= !$contents->billing->nama_depan ? 'checked' : '' ?>>
					<label class="form-check-label" for="save-info">
						Simpan alamat ini
					</label>
				</div>
				<hr class="my-4">
				<button type="button" class="w-100 btn btn-primary px-4 py-3" id="pay-button">Lanjutkan pembayaran</button>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Y_WcQB9_iSxtBxeZ"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', () => {
	const payWrap	= document.getElementById('payment-wrapper')
	const payForm	= document.getElementById('payment-form')
	const payBtn 	= document.getElementById('pay-button')
	const payAlert	= document.getElementById('payment-alert')

	const showAlert = (type, message) => {
		payAlert.innerHTML = ''
		payAlert.innerHTML = `
			<div class="alert alert-${type} text-start alert-dismissible fade show" role="alert">
				${message}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		`
	}

	payBtn.addEventListener('click', (e) => {
		if(payForm.checkValidity() === false) {
			payForm.classList.add('was-validated')
			showAlert('warning', 'Harap masukkan data dengan benar')

			return
		}

		payForm.classList.remove('was-validated')

        let userId      = parseInt('<?= $user->id ?>')
		let firstName	= document.getElementById('first-name').value
		let lastName	= document.getElementById('last-name').value
		let phone 		= document.getElementById('phone').value
		let email 		= "<?= $user->email ?>"
		let address 	= document.getElementById('address').value
		let country 	= document.getElementById('country').value
		let city 		= document.getElementById('city').value
		let postcode 	= document.getElementById('postcode').value
		let amount 		= document.getElementById('amount').value
		let saveInfo	= document.getElementById('save-info').checked

		let paymentData = {
			transaction_details: {
				order_id: Math.floor(Math.random() * 1000000000),
				gross_amount: amount
			},
			customer_details: {
				first_name: firstName,
				last_name: lastName,
				email: email,
				phone: phone,
				billing_address: {
					first_name: firstName,
					last_name: lastName,
					address: address,
					city: city,
					postal_code: postcode,
					phone: phone,
					country_code: country
				}
			},
			user: {
			    id: userId,
				save: saveInfo
			}
		}

		fetch('<?= base_url('payment') ?>', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(paymentData)
		})
		.then(response => response.json())
		.then(data => {
			if(data.status == 400 || data.status == '400')
				showAlert('danger', data.message)

			snap.pay(data.responses, {
				onSuccess: function(result) {
					result.user_id 		= parseInt('<?= $user->id ?>')
					result.package_id 	= parseInt('<?= $contents->package->id ?>')

					console.log(result)

					fetch('<?= base_url('payment/finish') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(result)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status == 200 || data.status == '200')
                            showAlert('success', 'Pembayaran berhasil. Lihat pembayaran anda <a href="<?= base_url('dashboard/payment') ?>">di sini</a>')
                        else
						showAlert('danger', 'Terjadi kesalahan. Pembayaran dibatalkan.')
                    })
				},
				onPending: function(result) {
					showAlert('warning', 'Pembayaran anda tertunda')
				},
				onError: function(result) {
					showAlert('danger', 'Terjadi kesalahan. Pembayaran dibatalkan.')
				},
				onClose: function() {
					showAlert('danger', 'Terjadi kesalahan. Pembayaran dibatalkan.')
				}
			})
		})
		.catch(error => {
			showAlert('danger', 'Terjadi kesalahan. Anda meninggalkan halaman sebelum pembayaran selesai.')
		})
	})
})
</script>
<?= $this->endSection() ?>