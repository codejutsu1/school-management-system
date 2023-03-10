<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\House;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Curriculum;
use App\Models\Department;
use App\Models\SubjectClass;
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
        $classes = [
            'jss1a', 
            'jss1b', 
            'jss1c', 
            'jss1d',
            'jss2a', 
            'jss2b', 
            'jss2c', 
            'jss2d', 
            'jss3a', 
            'jss3b', 
            'jss3c', 
            'jss3d',
        ];

        $curriculum = [
            'Football',
            'Chess',
            'BasketBall'
        ];

        $house = [
            'Peace',
            'National',
            'Liberty'
        ];

        $department = [
            'English',
            'Mathematics',
            'Chemistry',
            'Physics',
            'Biology',
        ];

        $gender = [
            'Male',
            'Female'
        ];

        foreach($department as $dept)
        {
            Department::create([
                'name' => $dept,
                'created_at' => Carbon::now(),
            ]);
        }

        foreach($curriculum as $curr)
        {
            Curriculum::create([
                'name' => $curr,
            ]);
        }

        foreach($house as $hous)
        {
            House::create([
                'name' => $hous,
            ]);
        }

        foreach($classes as $sub_class)
        {
            SubjectClass::create([
                'name'=> $sub_class,
            ]);
        }

        for($i=31; $i <= 80; $i++)
        {
            shuffle($classes);
            shuffle($curriculum);
            shuffle($house);
            shuffle($gender);

            Student::create([
                'user_id' => $i,
                'gender' => $gender[0],
                'extraCurriculumActivities' => $curriculum[0],
                'house' => $house[0],
                'class' => $classes[0],
                'classJoined' => $classes[1]
            ]);
        }

        for($i=11; $i <= 30; $i++)
        {
            shuffle($department);
            shuffle($house);
            shuffle($curriculum);
            shuffle($gender);

            Teacher::create([
                'user_id' => $i,
                'gender' => $gender[0],
                'extraCurriculumActivities' => $curriculum[0],
                'house' => $house[0],
                'department' => $department[0],
            ]);
        }
    }
}
