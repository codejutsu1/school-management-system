<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Principal',
            'email' => 'super@admin.com',
            'password' => Hash::make('mypassword')
        ]);

        DB::table('users')->insert([
            'name' => 'Vice Principal',
            'email' => 'admin@school.com',
            'password' => Hash::make('mypassword')
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher',
            'email' => 'teacher@school.com',
            'password' => Hash::make('mypassword')
        ]);

        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@school.com',
            'password' => Hash::make('mypassword')
        ]);

        DB::table('users')->insert([
            'name' => 'parents',
            'email' => 'parents@school.com',
            'password' => Hash::make('mypassword')
        ]);
    }
}
