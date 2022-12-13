<?php

namespace App\Http\Livewire;

use App\Models\Join;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class JoinUs extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $cv;
    public $dob;
    public $gender;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:50',
        'phone' => 'required|min:10|max:10',
        'dob' => 'required|date',
        'gender' => 'required',
        'cv' => 'required|max:20480|mimes:pdf,png,jpeg,psd,doc,docx'
    ];


    public function send() {
        $this->validate();


        $path = $this->cv->store('public/cv');


        Join::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
            'dob' =>  $this->dob,
            'gender' =>  $this->gender,
            'cv' =>  $path,
        ]);

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->dob = '';
        $this->gender = '';
        $this->cv = '';

        session()->flash('message', 'تم إرسال الطلب بنجاح');

    }


    public function render()
    {
        return view('livewire.join-us');
    }
}
