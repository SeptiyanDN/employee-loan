<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'harga_beli',
        'jumlah',
        'subtotal',
        'tenant_id'
    ];

}
