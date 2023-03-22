<?php

namespace App\Http\Livewire\Fees;

use App\Models\User;
use App\Models\Setting;
use App\Models\Student;
use Livewire\Component;
use App\Models\Transaction;
use Iamolayemi\Paystack\Facades\Paystack;

class SchoolFees extends Component
{
    public $student_class;
    public $session;
    public $amount;
    public $user;
    public $student_actual_class;
    
    public function mount()
    {
        $this->amount = Setting::where('id', 1)->value('fees');

        $this->user = User::where('id', auth()->user()->id)->select(['id','name', 'email'])->first();

        $this->student_actual_class = Student::where('user_id', auth()->user()->id)->value('class');
    }

    public function initialize()
    { 
        $title = strtoupper($this->student_class) . ' School Fees';

        $value = Transaction::where(['user_id'=> auth()->user()->id, 'title' => $title])->value($this->student_class);

        if($value)
        {
            session()->flash('message', 'You have paid for this class, contact the admin for ay further complaint');

            return redirect()->route('school.fees');
        }
        
        // Generate a unique payment reference
        $reference = Paystack::generateReference();

        // prepare payment details from form request
        $paymentDetails = [
            'email' => $this->user->email,
            'amount' => $this->amount * 100,
            'reference' => $reference,
            'callback_url' =>  route('callback'),
            'metadata' => [
                'user_id' => auth()->user()->id,
                'title' => $title, 
                'class' => $this->student_actual_class, 
                'session' => $this->session,
                'form' => $this->student_class,
                'route' => 'school.fees'
            ],
        ];

        // initialize new payment and get the response from the api call.
        $response = Paystack::transaction()
            ->initialize($paymentDetails)->response();


        if (!$response['status']) {
            session()->flash('message', 'The status message is false, check information properly.');
        }

        // redirect to authorization url
        return redirect($response['data']['authorization_url']);
    }

    public function render()
    {
        return view('livewire.fees.school-fees');
    }
}
