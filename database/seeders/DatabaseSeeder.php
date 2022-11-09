<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        IndoRegionProvinceSeeder::class,
        IndoRegionRegencySeeder::class,
        IndoRegionDistrictSeeder::class,
        IndoRegionVillageSeeder::class,
        RolesAndPermissionsSeeder::class,
        deskripsi_pemasukan::class,
        DeskripsiPengeluaranSeeder::class,
        ]);
    }
}
