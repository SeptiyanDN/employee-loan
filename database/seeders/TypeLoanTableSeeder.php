<?php

namespace Database\Seeders;

use App\Models\TypeLoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeLoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeLoan = [
            [
                'id'   => 1,
                'name' => 'Car Loan',
            ],
            [
                'id'   => 2,
                'name' => 'House Loan',
            ],
            [
                'id'   => 3,
                'name' => 'Medical Loan',
            ],
            [
                'id'   => 4,
                'name' => 'Consumtive Loan',
            ],
        ];
        TypeLoan::insert($typeLoan);
    }
}
