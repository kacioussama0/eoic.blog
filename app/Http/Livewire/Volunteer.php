<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Volunteer extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $cv;
    public $dob;
    public $gender;
    public $domain;
    public $time;
    public $country;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:50',
        'phone' => 'required|min:10|numeric',
        'dob' => 'required|date',
        'gender' => 'required',
        'time' => 'required',
        'country' => 'required',
        'domain' => 'required',
        'cv' => 'required|max:20480|mimes:pdf,png,jpeg,psd,doc,docx'
    ];


    public function send() {
        $this->validate();


        $path = $this->cv->store('public/cv');


        \App\Models\Volunteer::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
            'dob' =>  $this->dob,
            'gender' =>  $this->gender,
            'domain' =>  $this->domain,
            'time' =>  $this->time,
            'country' =>  $this->country,
            'cv' =>  $path,
        ]);

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->dob = '';
        $this->gender = '';
        $this->domain = '';
        $this->time = '';
        $this->country = '';

        session()->flash('message', 'تم إرسال الطلب بنجاح');

    }




    public function render()
    {
        return view('livewire.volunteer');
    }
}
