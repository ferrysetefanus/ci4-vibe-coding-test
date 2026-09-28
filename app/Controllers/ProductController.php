<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        helper(['form', 'url']);
    }

    /**
     * Tampilkan daftar produk
     */
    public function index()
    {
        $data = [
            'products' => $this->productModel->orderBy('id', 'DESC')->findAll(),
        ];

        return view('products/index', $data);
    }

    /**
     * Tampilkan form tambah produk
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Simpan produk baru ke database
     */
    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[3]|max_length[150]',
            'description' => 'permit_empty|string',
            'price'       => 'required|numeric|greater_than[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
        ];

        $messages = [
            'name' => [
                'required'   => 'Nama produk wajib diisi.',
                'min_length' => 'Nama produk minimal 3 karakter.',
                'max_length' => 'Nama produk maksimal 150 karakter.',
            ],
            'price' => [
                'required'     => 'Harga produk wajib diisi.',
                'numeric'      => 'Harga harus berupa angka.',
                'greater_than' => 'Harga harus lebih besar dari 0.',
            ],
            'stock' => [
                'required'              => 'Stok produk wajib diisi.',
                'integer'               => 'Stok harus berupa bilangan bulat.',
                'greater_than_equal_to' => 'Stok tidak boleh bernilai negatif.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        if ($this->productModel->save($data)) {
            return redirect()->to(site_url('products'))->with('success', 'Produk berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan produk. Silakan coba lagi.');
    }

    /**
     * Tampilkan form edit produk berdasarkan ID
     *
     * @param int|string $id
     */
    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (! $product) {
            return redirect()->to(site_url('products'))->with('error', 'Produk tidak ditemukan.');
        }

        return view('products/edit', [
            'product' => $product,
        ]);
    }

    /**
     * Perbarui data produk berdasarkan ID
     *
     * @param int|string $id
     */
    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (! $product) {
            return redirect()->to(site_url('products'))->with('error', 'Produk tidak ditemukan.');
        }

        $rules = [
            'name'        => 'required|min_length[3]|max_length[150]',
            'description' => 'permit_empty|string',
            'price'       => 'required|numeric|greater_than[0]',
            'stock'       => 'required|integer|greater_than_equal_to[0]',
        ];

        $messages = [
            'name' => [
                'required'   => 'Nama produk wajib diisi.',
                'min_length' => 'Nama produk minimal 3 karakter.',
                'max_length' => 'Nama produk maksimal 150 karakter.',
            ],
            'price' => [
                'required'     => 'Harga produk wajib diisi.',
                'numeric'      => 'Harga harus berupa angka.',
                'greater_than' => 'Harga harus lebih besar dari 0.',
            ],
            'stock' => [
                'required'              => 'Stok produk wajib diisi.',
                'integer'               => 'Stok harus berupa bilangan bulat.',
                'greater_than_equal_to' => 'Stok tidak boleh bernilai negatif.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
        ];

        if ($this->productModel->update($id, $data)) {
            return redirect()->to(site_url('products'))->with('success', 'Produk berhasil diperbarui.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui produk. Silakan coba lagi.');
    }

    /**
     * Hapus data produk berdasarkan ID
     *
     * @param int|string $id
     */
    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (! $product) {
            return redirect()->to(site_url('products'))->with('error', 'Produk tidak ditemukan.');
        }

        if ($this->productModel->delete($id)) {
            return redirect()->to(site_url('products'))->with('success', 'Produk berhasil dihapus.');
        }

        return redirect()->to(site_url('products'))->with('error', 'Gagal menghapus produk. Silakan coba lagi.');
    }
}
