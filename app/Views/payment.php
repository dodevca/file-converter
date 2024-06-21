<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">INVOICE DATE</th>
      <th scope="col">INVOICE ID</th>
      <th scope="col">AMOUNT</th>
      <th scope="col">STATUS</th>
      <th scope="col">METHOD</th>
      <th scope="col">DOWNLOAD</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row">2024-06-19T00:58:06:201Z</th>
      <td>66722D1e897595c2ddb4c00</td>
      <td>8</td>
      <td>Paid</td>
      <td>Stripe</td>
      <td><button type="button" class="btn btn-outline-secondary">PDF</button></td>
    </tr>
  </tbody>
</table>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
