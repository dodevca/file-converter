<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Account Info</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="twelvedotio@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Change password">
                </div>
            </div>
            <div class="col-md-6">
                <h2>Billing Info</h2>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Rio Ananda">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Payment</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tax/VAT ID">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Village</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sinduadi">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mlati">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Regency</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sleman">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">City</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Yogyakarta">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Region</label>
                    <select class="form-select" id="exampleFormControlSelect1">
                        <option value="indonesia">Indonesia</option>
                        <option value="malaysia">Malaysia</option>
                        <option value="singapore">Singapore</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Billing Info</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
