<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeBank;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin Account
        $createAdmin = User::create([
                'id'             => 1,
                'name'           => 'Candra Novita',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$PadOOF6GiHJqI1IQhPZNjeXkKGPip9vJXdhB5ra6lrvZdcZFZDCjy',
                'remember_token' => null,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        $createAdmin->assignRole('Admin');
        $employeeAdmin = Employee::create([
            'name' => $createAdmin->name,
            'nric' => 211011401511,
            'phone' => 81210917179,
            'number_id_staff'=> 511011,
            'haveALoan'=> false,
            'user_id' => $createAdmin->id
        ]);
        EmployeeBank::create([
            'name' => 'Malaysia Bank',
            'number' => 6941374541,
            'employee_id' => $employeeAdmin->id
        ]);

        EmployeeAddress::create([
            'address_line_1' => 'Jl. Kebayoran Lama No.57',
            'landmark' => 'astra building',
            'city' => 'jakarta selatan',
            'state' => 'DKI Jakarta',
            'country' => 'Indonesia',
            'employee_id' => $employeeAdmin->id
        ]);
        // Create Analyst Account
        $createAnalyst = User::create([
                'id'             => 2,
                'name'           => 'Elco Apri',
                'email'          => 'analyst@analyst.com',
                'password'       => '$2y$10$PadOOF6GiHJqI1IQhPZNjeXkKGPip9vJXdhB5ra6lrvZdcZFZDCjy',
                'remember_token' => null,
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        $createAnalyst->assignRole('Analyst');
        $employeeAnalyst = Employee::create([
            'name' => $createAnalyst->name,
            'nric' => 211011401512,
            'phone' => 81210917178,
            'number_id_staff'=> 511012,
            'haveALoan'=> false,
            'user_id' => $createAnalyst->id
        ]);
        EmployeeBank::create([
            'name' => 'Malaysia Bank',
            'number' => 6941374542,
            'employee_id' => $employeeAnalyst->id
        ]);
        EmployeeAddress::create([
            'address_line_1' => 'Jl. Viktor Buaran No.1',
            'landmark' => 'Unpam Building',
            'city' => 'Tangerang Selatan',
            'state' => 'Banten',
            'country' => 'Indonesia',
            'employee_id' => $employeeAnalyst->id
        ]);
        // Create CEO Account
    $createCeo = User::create([
            'id'             => 3,
            'name'           => 'Mia CEO Wong',
            'email'          => 'ceo@ceo.com',
            'password'       => '$2y$10$PadOOF6GiHJqI1IQhPZNjeXkKGPip9vJXdhB5ra6lrvZdcZFZDCjy',
            'remember_token' => null,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

    ]);
    $createCeo->assignRole('CEO');
    $employeeCeo = Employee::create([
        'name' => $createCeo->name,
        'nric' => 211011401513,
        'phone' => 81210917179,
        'number_id_staff'=> 511013,
        'haveALoan'=> false,
        'user_id' => $createCeo->id
    ]);
    EmployeeBank::create([
        'name' => 'Malaysia Bank',
        'number' => 6941374542,
        'employee_id' => $employeeCeo->id
    ]);
    EmployeeAddress::create([
        'address_line_1' => 'Jl. Puskesmas No.28',
        'landmark' => 'Krakatau Building',
        'city' => 'Serang',
        'state' => 'Banten',
        'country' => 'Indonesia',
        'employee_id' => $employeeCeo->id
    ]);
// Create Employee Account
    $createEmployee = User::create([
        'id'             => 4,
        'name'           => 'Septiyan Dwi Nugroho',
        'email'          => 'employee@employee.com',
        'password'       => '$2y$10$PadOOF6GiHJqI1IQhPZNjeXkKGPip9vJXdhB5ra6lrvZdcZFZDCjy',
        'remember_token' => null,
        'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

]);
$createEmployee->assignRole('Employee');
$employee = Employee::create([
    'name' => $createEmployee->name,
    'nric' => 211011401514,
    'phone' => 81210917171,
    'number_id_staff'=> 511015,
    'haveALoan'=> false,
    'user_id' => $createEmployee->id
]);
EmployeeBank::create([
    'name' => 'Malaysia Bank',
    'number' => 6941374542,
    'employee_id' => $employee->id
]);
EmployeeAddress::create([
    'address_line_1' => 'Jl. KH Hasyim Ashari No.90',
    'landmark' => 'Krenzsnack Building',
    'city' => 'Banten',
    'state' => 'DKI Jakarta',
    'country' => 'Indonesia',
    'employee_id' => $employee->id
]);


    }
}
