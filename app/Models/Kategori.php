<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = ['nama_kategori'];

    public function products(){
        return $this->hasMany(Produk::class);
    }
}
