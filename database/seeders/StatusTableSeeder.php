<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id'   => 1,
                'name' => 'Processing',
            ],
            [
                'id'   => 2,
                'name' => 'Analyst Approved',
            ],
            [
                'id'   => 3,
                'name' => 'Analyst Rejected',
            ],
            [
                'id'   => 4,
                'name' => 'Approved',
            ],
            [
                'id'   => 5,
                'name' => 'Rejected',
            ],
            [
                'id'    => 6,
                'name' => 'Transfered',
            ],
            [
                'id' => 7,
                'name' => 'Overdue',
            ],
            [
                'id' => 8,
                'name'  => 'Completed'
            ],
            [
                'id' => 9,
                'name' =>'Already Resending to Analyst'
            ]
        ];

        Status::insert($statuses);
    }
}
