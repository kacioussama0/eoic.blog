<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $title;
    public $value;

    public function __construct($title,$name,$value)
    {
        $this -> title = $title;
        $this -> name = $name;
        $this -> value = $value;
    }

    public function render()
    {
        return view('components.admin.forms.select');
    }
}
