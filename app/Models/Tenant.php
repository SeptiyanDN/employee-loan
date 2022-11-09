<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = ['name','subdomain','telepon','alamat','kelurahan','kode_pos'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
