<?php 

namespace App\Machine;

use App\Models\Department;

class Result
{
    public $result = [];

    public function displayResult($id)
    {
        $subjects = Department::pluck('name')->toArray();

        foreach($subjects as $key=>$subject)
        {
            $subject_model = "\\App\\Models\\".$subject;

            $scores_array[] = $subject_model::where('user_id', $id)->select('first_ca', 'second_ca', 'exam', 'total')->first()->toArray();

            $this->results[$key]['subject'] = $subject;
        }

        foreach($scores_array as $key=>$scores)
        {
            $this->results[$key]['first_ca'] = $scores['first_ca'];
            $this->results[$key]['second_ca'] = $scores['second_ca'];
            $this->results[$key]['exam'] = $scores['exam'];
            $this->results[$key]['total'] = $scores['total'];
        }

        return $this->results;
        
    }    


    public function studentsResult($session, $subject, $class)
    {   
        $subject_model = "\\App\\Models\\".$subject;

        $final_result = $subject_model::where(['class'=> $class, 'session' => $session])
                                        ->with('user', function($query){
                                            $query->select('id', 'name');
                                        })
                                        ->get();

        return $final_result;
    }
}