<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions

        //  Permission untuk Pegawai
         Permission::create(['name' => 'melihat pegawai']);
         Permission::create(['name' => 'menambahkan pegawai']);
         Permission::create(['name' => 'mengubah pegawai']);
         Permission::create(['name' => 'menghapus pegawai']);
        //  Permission untuk outlet
         Permission::create(['name' => 'melihat outlet']);
         Permission::create(['name' => 'menambahkan outlet']);
         Permission::create(['name' => 'mengubah outlet']);
         Permission::create(['name' => 'menghapus outlet']);
        //  Permission Untuk Transaksi
        Permission::create(['name' => 'melihat transaksi']);
        Permission::create(['name' => 'menambahkan transaksi']);
        Permission::create(['name' => 'mengubah transaksi']);
        Permission::create(['name' => 'menghapus transaksi']);

         // create roles and assign created permissions
         $role = Role::create(['name' => 'tamu']);

         // this can be done as separate statements
         $role = Role::create(['name' => 'kasir'])
            ->givePermissionTo([
                'melihat transaksi',
                'menambahkan transaksi'
            ]);

         // or may be done by chaining
         $role = Role::create(['name' => 'supervisor'])
             ->givePermissionTo([
                'melihat pegawai',
                'menambahkan pegawai',
                'melihat outlet',
                'melihat transaksi',
                'menambahkan transaksi'
            ]);

         $role = Role::create(['name' => 'admin'])
             ->givePermissionTo([
                'melihat pegawai',
                'menambahkan pegawai',
                'mengubah pegawai',
                'menghapus pegawai',
                'mengubah outlet',
                'melihat outlet',
                'menambahkan outlet',
                'menghapus outlet',
                'mengubah transaksi',
                'melihat transaksi',
                'menambahkan transaksi',
                'menghapus transaksi'
            ]);

         $role = Role::create(['name' => 'super admin']);
         $role->givePermissionTo(Permission::all());
    }
}
