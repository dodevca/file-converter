<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Account Info</h2>
      <form>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" value="twelvedotio@gmail.com">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password">
          <a href="#" class="text-muted">Change password</a>
        </div>
        <div class="form-group">
          <label for="billing-info">Billing Info</label>
          <input type="text" class="form-control" id="billing-info" value="Rio Ananda">
        </div>
        <div class="form-group">
          <label for="tax-vat-id">Tax/VAT ID</label>
          <input type="text" class="form-control" id="tax-vat-id" value="Sinduadi">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" value="Mlati, Sleman, Yogyakarta, Indonesia">
        </div>
        <div class="form-group">
          <label for="postal-code">Postal Code</label>
          <input type="text" class="form-control" id="postal-code" value="55284">
        </div>
        <button type="submit" class="btn btn-primary">Update Billing Info</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
