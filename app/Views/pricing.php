<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<section class="jumbotron bg-white py-5">
	<div class="container pb-5 mb-5">
		<h1 class="h3 fw-bold text-secondary text-center">Berlangganan dengan Convy</h1>
		<h2 class="h4 text-center">Konversi file besar dengan cepat dalam kecepatan sangat tinggi.</h2>
        <div class="row mt-4 pt-3">
            <?php foreach($contents->package as $p): ?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card border-0 shadow-lg rounded-3">
                        <div class="card-header bg-secondary border-0 text-center">
                            <h4 class="text-white fw-bold mb-0"><?= ucwords($p->nama) ?></h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <h3 class="text-primary mb-0">Rp<?= number_format($p->harga, 0, ',', '.') ?></h3>
                                <span class="small text-muted">/ bulan</span>
                            </div>
                            <ul class="list-unstyled my-3">
                                <li class="mb-3">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <?= $p->ukuran_maks / 1000000000 ?> GB ukuran masksimum
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <?= $p->menit_maks ?> menit konversi/Bulan
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <?= $p->konversi ?> konversi sekaligus
                                </li>
                                <?php if($p->kecepatan_tinggi): ?>
                                    <li class="mb-3">
                                        <i class="bi bi-check-circle text-success me-2"></i>Kecepatan tinggi
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <?php if(empty($user->id)): ?>
                                <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal">Berlangganan</button>
                            <?php else: ?>
                                <a href="<?= base_url('dashboard/payout?p=' . $p->id) ?>" class="btn btn-outline-primary w-100">Berlangganan</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="bg-primary text-white">
    <div class="container py-5">
        <h3 class="text-center mb-4">Yang Sering Ditanyakan</h3>
        <div class="accordion" id="faq-accordion">
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-1" aria-controls="faq-accordion-1"> Apa itu menit konversi? </button>
                </h2>
                <div id="faq-accordion-1" class=" accordion-collapse collapse">
                    <div class="accordion-body"> Menit konversi mengukur berapa lama waktu yang dibutuhkan untuk mengonversi file Anda di server kami. Umumnya, konversi foto dan dokumen hanya membutuhkan waktu satu menit saja untuk dikonversi. File besar atau codec tingkat lanjut menghabiskan lebih banyak menit konversi. Penggunaan menit konversi Anda terlihat di dasbor akun Anda. </div>
                </div>
            </div>
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-2" aria-controls="faq-accordion-2"> Bisakah saya mendaftar hanya untuk satu bulan? </button>
                </h2>
                <div id="faq-accordion-2" class="accordion-collapse collapse">
                    <div class="accordion-body"> Ya, Anda dapat berlangganan hanya untuk satu bulan. Semua langganan yang disediakan umumnya berdurasi 1 bulan. </div>
                </div>
            </div>
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-3" aria-controls="faq-accordion-3"> Bisakah saya mencoba konversi secara gratis? </button>
                </h2>
                <div id="faq-accordion-3" class="accordion-collapse collapse">
                    <div class="accordion-body"> Pengguna gratis mendapatkan 3 kali konversi per hari. Anda tidak perlu membuat akun untuk mendapatkan manfaat ini. Harap dicatat bahwa ada batasan ukuran 100 MB per file untuk penggunaan gratis. </div>
                </div>
            </div>
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-4" aria-controls="faq-accordion-4"> Berapa lama untuk mengaktifkan paket langganan? </button>
                </h2>
                <div id="faq-accordion-4" class=" accordion-collapse collapse">
                    <div class="accordion-body"> Paket akan ditambahkan ke akun Anda langsung setelah pembayaran. Anda dapat melihat riwayat pembayaran dan paket aktif Anda pada dasbor. </div>
                </div>
            </div>
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-5" aria-controls="faq-accordion-5"> Apakah detail pembayaran saya aman? </button>
                </h2>
                <div id="faq-accordion-5" class="accordion-collapse collapse">
                    <div class="accordion-body"> Kami menggunakan penyedia pembayaran (payment gateway) Midtrans untuk pemrosesan pembayaran. Data pembayaran ditransfer melalui pihak ketiga dan tidak pernah tersimpan dalam server kami. </div>
                </div>
            </div>
            <div class="accordion-item mb-3 rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-7" aria-controls="faq-accordion-7"> Metode pembayaran apa yang tersedia? </button>
                </h2>
                <div id="faq-accordion-7" class=" accordion-collapse collapse">
                    <div class="accordion-body"> Hampir semua jenis pembayaran tersedia, kecuali uang tunai. Tersedia lebih banyak metode pembayaran tergantung pada negara Anda. </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>