<?php

namespace App\Models;

use App\Traits\FilterByTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory, FilterByTenant;
    protected $fillable = ['nama_outlet','telepon','alamat','kelurahan','kode_pos','foto'];
}
