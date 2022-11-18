<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'landmark',
        'city',
        'state',
        'country',
        'employee_id',
    ];
}
