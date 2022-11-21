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
         Permission::create(['name' => 'user_management_access']);
         Permission::create(['name' => 'permission_create']);
         Permission::create(['name' => 'permission_edit']);
         Permission::create(['name' => 'permission_show']);
         Permission::create(['name' => 'permission_delete']);
         Permission::create(['name' => 'permission_access']);
// dipakai
         Permission::create(['name' => 'role_access_employee']);
         Permission::create(['name' => 'add_new_employee']);
         Permission::create(['name'=>'analyst_proccesing']);
         Permission::create(['name'=>'ceo_proccesing']);

            Permission::create(['name' => 'loan_application_create']);
            Permission::create(['name' => 'loan_application_edit']);
            Permission::create(['name' => 'loan_application_show']);
            Permission::create(['name' => 'loan_application_delete']);
            Permission::create(['name' => 'loan_application_access']);

      Permission::create(['name'=>'analyst_approve']);
      Permission::create(['name'=>'analyst_reject']);

      Permission::create(['name'=>'ceo_approve']);
      Permission::create(['name'=>'ceo_reject']);
      Permission::create(['name'=>'sending_money']);

      Permission::create(['name'=>'settings']);
      Permission::create(['name'=>'reports']);

      Permission::create(['name' => 'dashboard_employee']);
      Permission::create(['name' => 'dashboard_admin']);
// end

         Permission::create(['name' => 'role_create']);
         Permission::create(['name' => 'role_edit']);
         Permission::create(['name' => 'role_show']);
         Permission::create(['name' => 'role_delete']);
         Permission::create(['name' => 'role_access']);

        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_access']);

        Permission::create(['name' => 'audit_log_show']);
        Permission::create(['name' => 'audit_log_access']);

        Permission::create(['name' => 'status_create']);
        Permission::create(['name' => 'status_edit']);
        Permission::create(['name' => 'status_show']);
        Permission::create(['name' => 'status_delete']);
       Permission::create(['name' => 'status_access']);

       Permission::create(['name' => 'comment_create']);
       Permission::create(['name' => 'comment_edit']);
       Permission::create(['name' => 'comment_show']);

       Permission::create(['name' => 'comment_delete']);
      Permission::create(['name' => 'comment_access']);
      Permission::create(['name' => 'profile_password_edit']);





         // create roles and assign created permissions
         $role = Role::create(['name' => 'Admin'])
            ->givePermissionTo([
                // dipakai
                'add_new_employee',
                // end
                'user_management_access',
                'user_create',
                'user_edit',
                'user_access',
                'user_show',
                'user_access',
                'status_create',
                'status_edit',
                'status_show',
                'status_access',
                'loan_application_create',
                'loan_application_show',
                'loan_application_access',
                'comment_create',
                'comment_edit',
                'comment_show',
                'comment_access',
                'profile_password_edit',
                'dashboard_admin',



            ]);

         // this can be done as separate statements
         $role = Role::create(['name' => 'Employee'])
            ->givePermissionTo([
                'profile_password_edit',
                'dashboard_employee',
            ]);

         // or may be done by chaining
         $role = Role::create(['name' => 'Analyst'])
             ->givePermissionTo([
                // dipakai
                'analyst_proccesing',
                // end
                'status_create',
                'status_edit',
                'status_show',
                'status_access',
                'loan_application_show',
                'loan_application_access',
                'comment_create',
                'comment_edit',
                'comment_show',
                'comment_access',
                'profile_password_edit',
                'analyst_approve',
                'analyst_reject',
                'dashboard_admin',
            ]);

        //  $role = Role::create(['name' => 'CEO'])
        //      ->givePermissionTo([
        //         'user_management_access',
        //         'role_create',
        //         'permission_create',
        //         'permission_edit',
        //         'permission_show',
        //         'permission_delete',
        //         'permission_access',
        //         'role_create',
        //         'role_edit',
        //         'role_show',
        //         'role_delete',
        //         'role_access',
        //         'user_create',
        //         'user_edit',
        //         'user_access',
        //         'user_show',
        //         'user_delete',
        //         'user_access',
        //         'audit_log_show',
        //         'audit_log_access',
        //         'status_create',
        //         'status_edit',
        //         'status_show',
        //         'status_delete',
        //         'status_access',
        //         'loan_application_create',
        //         'loan_application_edit',
        //         'loan_application_show',
        //         'loan_application_delete',
        //         'loan_application_access',
        //         'comment_create',
        //         'comment_edit',
        //         'comment_show',
        //         'comment_delete',
        //         'comment_access',
        //         'profile_password_edit',
        //     ]);

         $role = Role::create(['name' => 'CEO']);
         $role->givePermissionTo(Permission::all());
    }
}
