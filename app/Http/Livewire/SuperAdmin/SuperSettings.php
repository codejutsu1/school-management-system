<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Setting;
use Livewire\Component;

class SuperSettings extends Component
{
    public $site_name;
    public $site_email;
    public $site_phone;
    public $session;
    public $fees;

    protected $rules = [
        'site_name' => 'required|string',
        'site_email' => 'required|email|string',
        'site_phone' => 'required|numeric',
        'session' => 'required|string',
        'fees' => 'required|numeric'
    ];

    public function mount()
    {
        $setting = Setting::first();

        $this->site_name = $setting->site_name ?? '';

        $this->site_email = $setting->site_email ?? '';

        $this->site_phone = $setting->site_phone ?? '';

        $this->session = $setting->session ?? '';

        $this->fees = $setting->fees ?? '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Setting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => $this->site_name,
                'site_email' => $this->site_email,
                'site_phone' => $this->site_phone,
                'session' => $this->session,
                'fees' => $this->fees
            ]
        );

        session()->flash('message', 'Your settings has been uploaded');

        return redirect()->route('super.admin.settings');
    }

    public function render()
    {
        return view('livewire.super-admin.super-settings');
    }
}
