<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory, FilterByTenant;

    protected $fillable = ['deskripsi_pemasukan_id','nominal','tenant_id','keterangan','image'];

}
