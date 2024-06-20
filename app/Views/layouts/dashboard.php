<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $meta->title ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('site.webmanifest') ?>">
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- custom CSS -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <?= $this->renderSection('style') ?>
</head>
<body>
    <div class="d-flex align-items-start">
        <aside>
            <div class="position-relative d-none d-lg-flex flex-column flex-shrink-0 bg-white border-end p-3 vh-100" style="width: 280px;z-index: 9999;">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= base_url('apple-touch-icon.png') ?>" class="logo">
                    <span class="d-none d-lg-inline" style="font-size: 1.25rem;">Convy</span>
                </a>
                <ul class="navbar-nav flex-column mt-4">
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $meta->name == 'dashboard' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'dashboard' ? 'area-current="page"' : '' ?>><i class="bi bi-grid-1x2-fill me-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard/payment') ?>" class="nav-link <?= $meta->name == 'payment' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'payment' ? 'area-current="page"' : '' ?>><i class="bi bi-credit-card-2-back-fill me-2"></i>Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dashboard/profile') ?>" class="nav-link <?= $meta->name == 'profile' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'profile' ? 'area-current="page"' : '' ?>><i class="bi bi-person-vcard-fill me-2"></i>Akun</a>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none offcanvas offcanvas-start" tabindex="-1" id="dashboardNavCanvas" aria-labelledby="dashboardNavCanvasLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url('apple-touch-icon.png') ?>" class="logo">
                        <span class="d-none d-lg-inline" style="font-size: 1.25rem;">Convy</span>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $meta->name == 'dashboard' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'dashboard' ? 'area-current="page"' : '' ?>><i class="bi bi-grid-1x2-fill me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/payment') ?>" class="nav-link <?= $meta->name == 'payment' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'payment' ? 'area-current="page"' : '' ?>><i class="bi bi-credit-card-2-back-fill me-2"></i>Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard/profile') ?>" class="nav-link <?= $meta->name == 'profile' ? 'active' : 'text-muted' ?>" <?= $meta->name == 'profile' ? 'area-current="page"' : '' ?>><i class="bi bi-person-vcard-fill me-2"></i>Akun</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="w-100">
            <header class="bg-white">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid justify-content-lg-end">
                        <div class="d-lg-none">
                            <button class="navbar-toggler me-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#dashboardNavCanvas" aria-controls="dashboardNavCanvas">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand" href="<?= base_url() ?>">
                                <img src="<?= base_url('apple-touch-icon.png') ?>" class="logo">
                                <span class="d-none d-lg-inline">Convy</span>
                            </a>
                        </div>
                        <div class="profile d-flex align-items-center justify-content-end order-lg-1">
                            <div class="dropdown">
                                <button class="btn btn-link text-muted text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle text-muted fs-3"></i>
                                </button>
                                <ul class="dropdown-menu border-0 shadow-lg dropdown-menu-end px-3">
								    <?php if($user->subscription->id_paket < 4): ?>
                                        <li><a class="dropdown-item rounded-3 bg-secondary bg-opacity-50 text-white" href="<?= base_url('pricing') ?>"><i class="bi bi<?=  $user->subscription ? '-person-fill-up' : '-award-fill' ?> me-2"></i><?=  $user->subscription ? 'Upgrade paket' : 'Berlanganan Sekarang' ?></a></li>
                                    <?php endif; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="position-relative">
                <?php if(session()->has('success') || session()->has('error')): ?>
                    <div class="position-absolute top-0 start-50 translate-middle-x container mb-3" style="z-index: 9999; max-width: 480px;">
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success text-start alert-dismissible fade show" role="alert">
                                <?= session()->get('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif(session()->has('error')): ?>
                            <div class="alert alert-danger text-start alert-dismissible fade show" role="alert">
                                <?= session()->get('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?= $this->renderSection('main') ?>
            </main>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<?= $this->renderSection('script') ?>
</body>
</html>