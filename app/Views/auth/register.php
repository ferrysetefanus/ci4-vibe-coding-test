<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Register - CI4 CRUD App<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-white text-center py-3 border-bottom-0">
                <div class="mb-2 text-primary">
                    <i class="bi bi-person-plus-fill fs-1"></i>
                </div>
                <h4 class="card-title fw-bold mb-0">Daftar Akun Baru</h4>
                <p class="text-muted small">Silakan lengkapi formulir pendaftaran di bawah ini</p>
            </div>
            <div class="card-body p-4 pt-2">
                <form action="<?= site_url('register') ?>" method="post" novalidate>
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text"
                               class="form-control <?= (session('errors.name')) ? 'is-invalid' : '' ?>"
                               id="name"
                               name="name"
                               value="<?= old('name') ?>"
                               placeholder="Contoh: John Doe"
                               required>
                        <?php if (session('errors.name')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.name') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Alamat Email</label>
                        <input type="email"
                               class="form-control <?= (session('errors.email')) ? 'is-invalid' : '' ?>"
                               id="email"
                               name="email"
                               value="<?= old('email') ?>"
                               placeholder="nama@domain.com"
                               required>
                        <?php if (session('errors.email')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password"
                               class="form-control <?= (session('errors.password')) ? 'is-invalid' : '' ?>"
                               id="password"
                               name="password"
                               placeholder="Minimal 8 karakter"
                               required>
                        <?php if (session('errors.password')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirm" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password"
                               class="form-control <?= (session('errors.password_confirm')) ? 'is-invalid' : '' ?>"
                               id="password_confirm"
                               name="password_confirm"
                               placeholder="Ulangi password di atas"
                               required>
                        <?php if (session('errors.password_confirm')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.password_confirm') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg fs-6">
                            <i class="bi bi-person-check me-1"></i> Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-light text-center py-3 border-0">
                <span class="text-muted small">Sudah memiliki akun?</span>
                <a href="<?= site_url('login') ?>" class="text-decoration-none fw-semibold small ms-1">Login di sini</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
