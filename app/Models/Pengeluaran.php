<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = ['deskripsi_pengeluaran_id','nominal','image','keterangan'];
}
