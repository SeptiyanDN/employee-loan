<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'address',
        'nric',
        'phone',
        'number_id_staff',
        'haveAloan',
        'user_id'
    ];
    public function LoanApplication(){
        return $this->hasOne('App\Models\LoanApplication','id');
    }
}
