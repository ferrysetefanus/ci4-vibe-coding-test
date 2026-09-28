<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Login - CI4 CRUD App<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white text-center py-3 border-bottom-0">
                <div class="mb-2 text-primary">
                    <i class="bi bi-shield-lock-fill fs-1"></i>
                </div>
                <h4 class="card-title fw-bold mb-0">Masuk ke Akun</h4>
                <p class="text-muted small">Masukkan email dan password untuk melanjutkan</p>
            </div>
            <div class="card-body p-4 pt-2">
                <form action="<?= site_url('login') ?>" method="post" novalidate>
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Alamat Email</label>
                        <input type="email"
                               class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>"
                               id="email"
                               name="email"
                               value="<?= old('email') ?>"
                               placeholder="nama@domain.com"
                               required
                               autofocus>
                        <?php if (session('errors.email')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password"
                               class="form-control <?= (session('errors.password')) ? 'is-invalid' : '' ?>"
                               id="password"
                               name="password"
                               placeholder="Masukkan password"
                               required>
                        <?php if (session('errors.password')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg fs-6">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk (Login)
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-light text-center py-3 border-0">
                <span class="text-muted small">Belum punya akun?</span>
                <a href="<?= site_url('register') ?>" class="text-decoration-none fw-semibold small ms-1">Daftar sekarang</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
