<?= $this->extend('layouts/app') ?>

<?= $this->section('style') ?>
<style>
	body {
      background-color: #f8f9fa;
	}
	
.accordion-item {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    margin-bottom: 10px;
}

.accordion-header {
    background-color: #e9ecef;
    padding: 15px;
    cursor: pointer;
    border-bottom: 1px solid #dee2e6;
    position: relative;
}

.accordion-header:hover {
    background-color: #ced4da;
}

.accordion-header:focus {
    outline: none;
}

.accordion-body {
    padding: 15px;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

/* Icon untuk indikator accordion */
.accordion-icon {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    font-size: 20px;
    transition: transform 0.3s ease;
}

.accordion-item.collapsed .accordion-icon {
    transform: translateY(-50%) rotate(-180deg);
}

	

</style>

<?= $this->endSection() ?>
<?= $this->section('main') ?>

<section class="container">
	<h1 class="text-center mt-4"> Konversi</h1>
	<p class="text-center m-2">Konversi file besar dengan cepat dalam kecepatan sangat tinggi.</p>
	<div class="d-flex justify-content-between flex-wrap gap-3 mb-3 mt-5">
		<div class="card text-center">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Basic</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title text-primary">Rp.100.000<small class="text-muted"></small>
				</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>
						<i class="bi bi-check-circle text-success"></i>1 User
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>1,5GB Max storage
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Email Support
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Help Center Access
					</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-outline-primary">Daftar</button>
			</div>
		</div>
		<div class="card text-center">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Standard</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title text-primary">Rp.200.000 <small class="text-muted"></small>
				</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>
						<i class="bi bi-check-circle text-success"></i>1 User
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>1Gb Max Storage
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Email Support
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Help Center Access
					</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-outline-primary">Daftar</button>
			</div>
		</div>
		<div class="card text-center">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Pro</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title text-primary">Rp.300.000 <small class="text-muted"></small>
				</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>
						<i class="bi bi-check-circle text-success"></i>1 User
					</li>
					<li>
					<li class="d-flex align-items-center gap-2">
						<i class="bi bi-check-circle text-success"></i>
						<select class="form-control" id="format" name="format">
							<option value="pdf">3gb</option>
							<option value="doc">6gb</option>
							<option value="txt">8gb</option>
							<!-- Tambahkan opsi lainnya sesuai dengan kebutuhan -->
						</select>Max storage
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Email Support
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Help Center Access
					</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-outline-primary">Daftar</button>
			</div>
		</div>
		<div class="card text-center">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">24-Hours</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title text-primary">Rp.50.000 <small class="text-muted"></small>
				</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>
						<i class="bi bi-check-circle text-success"></i>1 User
					</li>
					<li class="d-flex align-items-center gap-2">
						<i class="bi bi-check-circle text-success"></i>
						<select class="form-control" id="format" name="format">
							<option value="pdf">500mb</option>
							<option value="doc">1gb</option>
							<option value="txt">2gb</option>
							<!-- Tambahkan opsi lainnya sesuai dengan kebutuhan -->
						</select>Max Storage
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Email Support
					</li>
					<li>
						<i class="bi bi-check-circle text-success"></i>Help Center Access
					</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-outline-primary">Daftar</button>
			</div>
			<!-- Cards lainnya bisa ditambahkan di sini -->
		</div>
    </div>
    <h2 class="my-5 text-center">Frequently Asked Questions</h2>
	
    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
	  Apa itu menit konversi?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
	  Menit konversi mengukur berapa lama waktu yang dibutuhkan untuk mengonversi file Anda di server kami. Umumnya, konversi foto dan dokumen hanya membutuhkan waktu satu menit saja untuk dikonversi. File besar atau codec tingkat lanjut menghabiskan lebih banyak menit konversi. Penggunaan menit konversi Anda terlihat di dasbor akun Anda. Kami hanya menagih Anda untuk konversi yang berhasil.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
	  Bisakah saya mendaftar hanya untuk satu bulan?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
	  Ya, Anda dapat mendaftar akun pro hanya untuk satu bulan. Cukup batalkan langganan (dari halaman akun) kapan saja sehingga tidak diperpanjang setelah bulan pertama.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
	  Bisakah saya mencoba FreeConvert.com secara gratis?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
	  Pengguna gratis mendapatkan 20 menit konversi per hari. Bagi sebagian besar pengguna, konversi hanya memerlukan waktu satu menit atau kurang. Ini berarti hingga 20 file per hari dapat dikonversi secara gratis. Anda tidak perlu membuat akun untuk mendapatkan manfaat ini. Harap dicatat bahwa ada batasan 5 menit konversi per file untuk penggunaan gratis.
      </div>
    </div>
  </div>
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
      Berapa lama untuk mengaktifkannya?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
      <div class="accordion-body">
	  Fitur Pro akan ditambahkan ke akun Anda segera setelah pembayaran.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
	  Apakah detail pembayaran saya aman?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
      <div class="accordion-body">
	  We use industry-leading payment providers Stripe and PayPal for payment processing. Payment data is transferred through 128-bit secure HTTPS and is never saved on our servers.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
	  Bagaimana jika konversi file saya gagal?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
      <div class="accordion-body">
	  Jika Anda mengalami masalah saat mengonversi file, teknisi kami yang berdedikasi akan dengan senang hati membantu Anda. Silakan kirim email kepada kami menggunakan halaman hubungi kami.
      </div>
    </div>
  </div>
  <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeven">
	  Metode pembayaran apa yang tersedia?
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show">
      <div class="accordion-body">
	  Saat ini kami menerima Kartu Kredit/Debit (Visa, MasterCard, Amex, Discover, Diners Club, JCB), PayPal, Google Pay, Apple Pay, Alipay, iDEAL, Sofort, GiroPay. Tersedia lebih banyak metode pembayaran tergantung pada negara Anda.
      </div>
    </div>
  </div>
  </div>
</section>
<?= $this->endSection() ?>