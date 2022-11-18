<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_employee',
        'name_bank',
        'number_bank',
        'image',
        'loan_application_id'
    ];
}
