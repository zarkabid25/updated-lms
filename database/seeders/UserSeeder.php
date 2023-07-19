<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'status' => '1',
         ]);
         $teacher = User::create([
             'name' => 'teacher',
             'email' => 'teacher@teacher.com',
             'password' => bcrypt('12345678'),
             'status' => '1',
          ]);
          $student = User::create([
              'name' => 'student',
              'email' => 'student@student.com',
              'password' => bcrypt('12345678'),
              'status' => '1',
           ]);

           $role1 = Role::find(1);
           $admin->assignRole($role1->name);
           $role2 = Role::find(2);
           $teacher->assignRole($role2->name);
           $role3 = Role::find(3);
           $student->assignRole($role3->name);

    }
}
