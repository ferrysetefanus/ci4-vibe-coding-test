<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Daftar Produk - CI4 CRUD App<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex flex-wrap align-items-center justify-content-between gap-2 border-bottom">
                <div>
                    <h5 class="card-title fw-bold mb-1 text-dark">
                        <i class="bi bi-box-seam me-1 text-primary"></i> Kelola Daftar Produk
                    </h5>
                    <p class="text-muted small mb-0">Semua produk yang terdaftar dalam inventaris</p>
                </div>
                <div>
                    <a href="<?= site_url('products/create') ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Produk Baru
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center" style="width: 60px;">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" class="text-end">Harga</th>
                                <th scope="col" class="text-center" style="width: 100px;">Stok</th>
                                <th scope="col" class="text-center" style="width: 170px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (! empty($products) && is_array($products)): ?>
                                <?php foreach ($products as $index => $product): ?>
                                    <tr>
                                        <td class="text-center text-muted fw-semibold"><?= $index + 1 ?></td>
                                        <td class="fw-bold text-dark"><?= esc($product['name']) ?></td>
                                        <td>
                                            <?php if (! empty($product['description'])): ?>
                                                <span class="text-muted"><?= esc($product['description']) ?></span>
                                            <?php else: ?>
                                                <span class="text-muted fst-italic">- Tidak ada deskripsi -</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end fw-semibold text-success">
                                            Rp <?= number_format((float)$product['price'], 0, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($product['stock'] > 10): ?>
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                                    <?= esc($product['stock']) ?>
                                                </span>
                                            <?php elseif ($product['stock'] > 0): ?>
                                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">
                                                    <?= esc($product['stock']) ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">
                                                    Habis
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="<?= site_url('products/edit/' . $product['id']) ?>"
                                                   class="btn btn-outline-warning"
                                                   title="Edit Produk">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="<?= site_url('products/delete/' . $product['id']) ?>"
                                                   class="btn btn-outline-danger"
                                                   title="Hapus Produk"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus produk \'<?= esc($product['name'], 'js') ?>\'?');">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                                        <p class="mb-2 fw-semibold">Belum ada data produk.</p>
                                        <a href="<?= site_url('products/create') ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-plus-lg me-1"></i> Tambah Produk Pertama
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-top py-3 text-muted small d-flex justify-content-between align-items-center">
                <span>Total: <strong><?= count($products ?? []) ?></strong> produk terdaftar</span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
