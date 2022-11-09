<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = [
        'supplier_id',
        'total_item',
        'total_harga',
        'diskon',
        'bayar',
        'tenant_id'
    ];
    public function supplier(){
        return $this->belongsTo(Supplier::class, );

    }
}
