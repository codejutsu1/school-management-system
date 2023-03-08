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

            $scores_array[] = $subject_model::where('user_id', $id)->select('first_ca', 'second_ca', 'exam', 'total', 'position')->first()->toArray();

            $this->results[$key]['subject'] = $subject;
        }

        foreach($scores_array as $key=>$scores)
        {
            $this->results[$key]['first_ca'] = $scores['first_ca'];
            $this->results[$key]['second_ca'] = $scores['second_ca'];
            $this->results[$key]['exam'] = $scores['exam'];
            $this->results[$key]['total'] = $scores['total'];
            $this->results[$key]['position'] = $scores['position'];
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

    public function studentPosition($session, $classes, $className)
    {
        $students_id = $className::where(['class' => $classes, 'session' => $session])->pluck('user_id');

        $total_scores = $className::where(['class'=> $classes, 'session'=> $session])->pluck('total')->toArray();

        foreach($students_id as $id)
        {
            $total_score = $className::where(['user_id'=>$id,'class'=> $classes, 'session'=> $session])->value('total');

            $className::where(['user_id'=>$id,'class'=> $classes, 'session'=> $session])->update([
                'position' => position($total_score, $total_scores),
            ]);
        }
    }


    public function uploadResult($session, $form_class)
    {
        $new_class = $form_class[0].$form_class[1].$form_class[2].$form_class[3];

        $new_class = ucfirst($new_class);

        $class_model = "\\App\\Models\\".$new_class;

        $subjects = Department::pluck('name')->toArray();


        $students_id = $class_model::where(['session' => $session, 'classes' => $form_class])->pluck('user_id')->toArray();

        foreach($students_id as $student_id)
        {
            foreach($subjects as $subject)
            {
                $subject_model = "\\App\\Models\\".$subject;

                $total = $subject_model::where(['user_id'=> $student_id, 'session' => $session, 'class'=> $form_class])->value('total');

                $total_scores[] = $total;
            }

            $total_score = array_sum($total_scores);

            $average = $total_score / count($subjects);

            $class_model::where(['user_id'=>$student_id, 'session' => $session, 'classes' => $form_class])->update([
                'total' => $total_score,
                'average' => $average,
            ]);

            $total_scores = [];
        }

        //For the positon based on average

        $form_scores = $class_model::where(['session' => $session, 'classes' => $form_class])->pluck('average')->toArray();

        $class_scores = $class_model::where('session', $session)->pluck('average')->toArray(); 

        foreach($students_id as $student_id)
        {
            $average = $class_model::where(['user_id'=>$student_id, 'session' => $session, 'classes' => $form_class])->value('average');

            $class_model::where(['user_id'=>$student_id, 'session' => $session, 'classes' => $form_class])->update([
                'position' => position($average, $form_scores),
                'class_position' => position($average, $class_scores)
            ]);
        }
    }
}