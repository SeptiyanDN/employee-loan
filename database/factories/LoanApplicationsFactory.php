<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanApplications>
 */
class LoanApplicationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number_application' => Str::random(10),
            'employee_id' => 1,
            'typeLoan_id' => 1,
            'period' => 2,
            'charge_fee' =>0,
            'bunga' => 0,
            'loan_ammount' => 12000000,
            'description' => 'testing',
            'status_id' =>1,
            'remaining_payment' => 1,
            'mountly_installment' => 1,
            'created_by_id' => 1
        ];
    }
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

