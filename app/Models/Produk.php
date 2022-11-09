<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Produk extends Model
{
    use HasFactory, FilterByTenant, Notifiable;
    protected $fillable = [
        'image',
        'nama_produk',
        'kategori_id',
        'merek_id',
        'harga_jual',
        'harga_modal',
        'sku',
        'satuan',
        'stok',
        'minimum_stok',
        'favorit',
        'notifikasi_stok_minimum',
        'tenant_id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, );
    }
    public function merek(){
        return $this->belongsTo(Merek::class,);
    }

}
