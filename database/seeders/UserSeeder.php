<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $password = Hash::make('mypassword');
        
        $super_admin = Role::create(['name' => 'super admin']);
        $vice_principals = Role::create(['name' => 'vice principal']);
        $teachers = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $parent = Role::create(['name' => 'parent']);

        Permission::create(['name' => 'view school']);
        Permission::create(['name' => 'view principals']);
        
        $super_admin->givePermissionTo([
            'view school',
            'view principals'
        ]);

        $vice_principals->givePermissionTo([
            'view school'
        ]);

        $user = User::create([
            'name' => 'Principal',
            'email' => 'super@admin.com',
            'password' => Hash::make('mypassword'),
            'slug' => 'principal'
        ]);

        $user->assignRole($super_admin);

        $user = User::create([
            'name' => 'Vice Principal',
            'email' => 'admin@school.com',
            'password' => Hash::make('mypassword'),
            'slug' => 'vice-principal'
        ]);

        $user->assignRole($vice_principals);

        $user = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@school.com',
            'password' => Hash::make('mypassword'),
            'slug' => 'teacher'
        ]);

        $user->assignRole($teachers);

        $user = User::create([
            'name' => 'student',
            'email' => 'student@school.com',
            'password' => Hash::make('mypassword'),
            'slug' => 'student'
        ]);

        $user->assignRole($student);

        $user = User::create([
            'name' => 'parents',
            'email' => 'parents@school.com',
            'password' => Hash::make('mypassword'),
            'slug' => ''
        ]);

        $user->assignRole($parent);

        for ($i=0; $i < 5; $i++) { 
            $name = $faker->name;
            $user = User::create([
                'name' => $name,
                'email' => $faker->email,
                'password' => $password,
                'slug' => slugify($name)
            ]);

            $user->assignRole($vice_principals);
        }

        for ($i=0; $i < 20; $i++) {
            $name = $faker->name ;
            $user = User::create([
                'name' => $name,
                'email' => $faker->email,
                'password' => $password,
                'slug' => slugify($name)
            ]);

            $user->assignRole($teachers);
        }

        for ($i=0; $i < 50; $i++) {
            $name = $faker->name ;
            $user = User::create([
                'name' => $name,
                'email' => $faker->email,
                'password' => $password,
                'slug' => slugify($name)
            ]);

            $user->assignRole($student);
        }

        for ($i=0; $i < 30; $i++) {
            $name = $faker->name ;
            $user = User::create([
                'name' => $name,
                'email' => $faker->email,
                'password' => $password,
                'slug' => slugify($name)
            ]);

            $user->assignRole($parent);
        }
    }
}
