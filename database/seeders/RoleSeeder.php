<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'super admin',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'vice principal',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'teacher',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'student',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'parent',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
        ]);
    }
}
