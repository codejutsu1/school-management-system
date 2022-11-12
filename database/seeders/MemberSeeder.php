<?php

namespace Database\Seeders;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = ['jss1', 'jss2', 'jss3', 'sss1', 'sss2', 'sss3'];

        for($i=31; $i <= 80; $i++)
        {
            shuffle($classes);

            Student::create([
                'user_id' => $i,
                'class' => $classes[0]
            ]);
        }

        for ($i=81; $i <= 110; $i++) { 
            Parents::create([
                'user_id' => $i,
                'student_id' => rand(1, 50),
            ]);
        }
    }
}
