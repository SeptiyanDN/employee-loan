<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = [
        'nama_supplier',
        'telepon',
        'email',
        'alamat',
        'kelurahan',
        'kode_pos',
        'nama_perwakilan',
        'telepon_perwakilan',
        'email_perwakilan',

    ];
    public function tenants(){
        return $this->belongsToMany(Tenant::class);
    }
}
