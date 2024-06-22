<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container py-5">
  <div class="card">
    <div class="card-body">
        <h3 class="h5">Menit Konversi Tersedia</h3>
        <?php if($user->subscription): ?>
          <p class="mb-0"><span class="fs-4 fw-bold"><?= $user->subscription->menit ?></span> / <?= $user->package->menit_maks ?> menit</p>
        <?php else: ?>
          <p><span class="fs-4 fw-bold">0</span> / 0 menit</p>
          <p class="text-muted">Anda belum berlangganan paket apapun. Menit konversi file Anda sangat terbatas.</p>
          <a href="<?= base_url('pricing') ?>" class="btn btn-outline-secondary">Berlangganan sekarang</a>
        <?php endif; ?>
    </div>
  </div>
</div>
<div class="container pt-4">
  <div class="card">
    <div class="card-body overflow-auto">
      <h3 class="h5">Langganan</h3>
      <?php if($user->subscription): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Paket</th>
              <th scope="col">Berakhir pada</th>
              <th scope="col">Harga</th>
              <th scope="col">Maks. Konversi</th>
              <th scope="col">Maks. Ukuran File</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= ucwords($user->package->nama) ?></td>
              <td><?= date('d/m/Y', strtotime($user->subscription->tanggal_berakhir)) ?></td>
              <td>Rp<?= number_format($user->package->harga, 0, ',', '.') ?></td>
              <td><?= $user->package->konversi ?> file sekaligus</td>
              <td><?= $user->package->ukuran_maks / 1000000000 ?> GB</td>
              <td>
                <a href="<?= base_url('pricing') ?>" class="btn btn-primary">Upgrade</a>
                <a href="<?= base_url('dashboard/cancel') ?>" class="btn btn-outline-danger">Cancel</a>
              </td>
            </tr>
          </tbody>
        </table>
      <?php else: ?>
        <p class="text-muted text-center mb-0">Anda belum berlangganan paket apapun.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
