<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaranLoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_employee',
        'mountly_installment',
        'image',
        'loan_application_id'
    ];

    public function loan() {
        return $this->belongsTo(LoanApplications::class);
    }
}
