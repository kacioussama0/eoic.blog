<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email|max:50',
        'subject' => 'required|min:5|max:50',
        'message' => 'required|min:15|max:100'
    ];


    public function send() {
        $this->validate();
        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';

        session()->flash('message', 'تم إرسال الرسالة بنجاح');

    }


    public function render()
    {
        return view('livewire.contact');
    }
}
