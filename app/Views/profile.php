<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('dashboard/update') ?>" method="POST">
                        <h5>Informasi Akun</h5>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $contents->user->email ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password">Ganti Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ganti password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password-match">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password-match" name="password-match" placeholder="Konfirmasi Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('dashboard/update') ?>" method="POST">
                        <h5>Alamat Penagihan</h5>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label for="first-name" class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="" value="<?= $contents->user->nama_depan ?? '' ?>" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="last-name" class="form-label">Nama Belakang</label>
                                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="" value="<?= $contents->user->nama_belakang ?? '' ?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="" value="<?= $contents->user->telepon ?? '' ?>" required="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?= $contents->user->alamat ?? '' ?>" required="">
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="country" class="form-label">Negara</label>
                                <select class="form-select" id="country" name="country" required>
                                    <?php foreach($contents->country as $c): ?>
                                        <option value="<?= $c->nama ?>" <?= $contents->user->negara == $c->nama ? 'selected' : '' ?>><?= $c->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?= $contents->user->kota ?? '' ?>" required="">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="postcode" class="form-label">Kode POS</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" value="<?= $contents->user->zip ?? '' ?>" required="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
