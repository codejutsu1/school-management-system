<?php

namespace App\Http\Livewire\Fees;

use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use App\Models\SubjectClass;
use Iamolayemi\Paystack\Facades\Paystack;

class OtherFees extends Component
{
    public $title;
    public $amount;
    public $user;
    public $student_actual_class;
    public $student_class;
    public $session;
    public $classes;

    protected $rules = [
        'title' => 'required|string',
        'amount' => 'required|numeric',
    ];

    public function mount()
    {
        $this->classes = SubjectClass::pluck('name');
        
        $this->user = User::where('id', auth()->user()->id)->select(['id', 'name', 'email'])->first();

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        if($this->student_actual_class)
        {
            $this->student_class = substr($this->student_actual_class, 0, -1);

            $this->student_class = strtolower($this->student_class);
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
                'title' => $this->title, 
                'class' => $this->student_actual_class, 
                'session' => $this->session,
                'form' => $this->student_class,
                'route' => 'other.fees'
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
        return view('livewire.fees.other-fees');
    }
}
