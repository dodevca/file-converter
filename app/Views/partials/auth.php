<?php if(empty($user->id)): ?>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 mx-auto" style="max-width: 576px">
                    <div class="text-center">
                        <img src="<?= base_url('android-chrome-192x192.png') ?>" class="w-100 h-auto" style="max-width: 180px">
                        <h2 class="h4 mt-3 mb-4">Login</h2>
                    </div>
                    <?php if(session()->has('login_error')): ?>
                        <div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
                            <ul>
                                <?php foreach(session('login_error') as $err): ?>
                                    <li><?= $err ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="login-email" name="email" placeholder="name@example.com" required>
                            <label for="eamil">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 px-4 py-3 mb-3">
                            Login
                        </button>
                    </form>
                    <div class="py-3">
                        <p class="text-muted text-center">Belum memiliki akun? <a href="javascript:;" class="link-offset-2" data-bs-toggle="modal" data-bs-target="#signupModal">Daftar disini.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 mx-auto" style="max-width: 576px">
                    <div class="text-center">
                        <img src="<?= base_url('android-chrome-192x192.png') ?>" class="w-100 h-auto" style="max-width: 180px">
                        <h2 class="h4 mt-3 mb-4">Sign Up</h2>
                    </div>
                    <?php if(session()->has('signup_error')): ?>
                        <div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
                            <ul>
                                <?php foreach(session('signup_error') as $err): ?>
                                    <li><?= $err ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('signup') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="signup-email" name="email" placeholder="name@example.com" required>
                            <label for="eamil">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="signup-password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="signup-password-match" name="password-match" placeholder="Konfirmasi Password" required>
                            <label for="password-match">Konfirmasi Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="approve" required>
                            <label class="form-check-label" for="approve">
                                Dengan melanjutkan, Anda menyetujui Ketentuan Layanan dan Privasi kami.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 px-4 py-3 mb-3">
                            Daftar Akun
                        </button>
                    </form>
                    <div class="py-3">
                        <p class="text-muted text-center">Sudah memiliki akun? <a href="javascript:;" class="link-offset-2" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>