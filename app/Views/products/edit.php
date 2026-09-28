<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Produk - CI4 CRUD App<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="card-title fw-bold mb-0 text-dark">
                        <i class="bi bi-pencil-square me-1 text-warning"></i> Edit Produk
                    </h5>
                    <p class="text-muted small mb-0">Ubah detail informasi produk ID: #<?= esc($product['id']) ?></p>
                </div>
                <a href="<?= site_url('products') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('products/update/' . $product['id']) ?>" method="post" novalidate>
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>"
                               id="name"
                               name="name"
                               value="<?= old('name', $product['name']) ?>"
                               placeholder="Contoh: Kopi Robusta 250g"
                               required>
                        <?php if (session('errors.name')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.name') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi Produk</label>
                        <textarea class="form-control <?= session('errors.description') ? 'is-invalid' : '' ?>"
                                  id="description"
                                  name="description"
                                  rows="3"
                                  placeholder="Deskripsi singkat mengenai produk (opsional)"><?= old('description', $product['description']) ?></textarea>
                        <?php if (session('errors.description')): ?>
                            <div class="invalid-feedback">
                                <?= session('errors.description') ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">Harga (IDR) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number"
                                       step="any"
                                       class="form-control <?= session('errors.price') ? 'is-invalid' : '' ?>"
                                       id="price"
                                       name="price"
                                       value="<?= old('price', $product['price']) ?>"
                                       placeholder="Contoh: 45000"
                                       required>
                                <?php if (session('errors.price')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.price') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-semibold">Jumlah Stok <span class="text-danger">*</span></label>
                            <input type="number"
                                   min="0"
                                   step="1"
                                   class="form-control <?= session('errors.stock') ? 'is-invalid' : '' ?>"
                                   id="stock"
                                   name="stock"
                                   value="<?= old('stock', $product['stock']) ?>"
                                   placeholder="Contoh: 10"
                                   required>
                            <?php if (session('errors.stock')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.stock') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 border-top pt-3">
                        <a href="<?= site_url('products') ?>" class="btn btn-light border px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i> Perbarui Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
