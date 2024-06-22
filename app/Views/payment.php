<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container pt-5">
  <div class="card">
    <div class="card-body overflow-auto">
      <h3 class="h5">Daftar pembayaran paket</h3>
      <?php if(!empty($contents)): ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Harga</th>
              <th scope="col">Metode</th>
              <th scope="col">Paket</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach($contents as $p): ?>
              <tr>
                <td><?= date('d-m-Y H:i', strtotime($p->tanggal)) ?></td>
                <td>Rp<?= number_format($p->total, 0, ',', '.') ?></td>
                <td><?= $p->metode ?></td>
                <td><?= ucwords($p->paket) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p class="text-muted text-center mb-0">Anda belum melakukan transaksi apapun.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
