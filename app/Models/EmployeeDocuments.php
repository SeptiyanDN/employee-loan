<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocuments extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_company',
        'card_company',
        'card_national',
        'employee_id',
    ];
}
