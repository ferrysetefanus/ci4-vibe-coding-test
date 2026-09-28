<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'price', 'stock'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name'        => 'required|min_length[3]|max_length[150]',
        'description' => 'permit_empty|string',
        'price'       => 'required|numeric|greater_than[0]',
        'stock'       => 'required|integer|greater_than_equal_to[0]',
    ];

    protected $validationMessages = [
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

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
