<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'guard_name'=>'web'
        ]);

        Role::create([
                'name'=>'Teacher',
                'guard_name'=>'web'
        ]);

        Role::create([
            'name'=>'Student',
            'guard_name'=>'web'
        ]);


        // $role1 = Role::find(1);
        // $role1->givePermissionTo(['Trade Setting']);

        $role2 = Role::find(1);
        $role2->givePermissionTo([
            'Courses',
        ]);

    }
}
