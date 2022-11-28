<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{

    public $title ;
    public $name;
    public $type;

    public function __construct($title,$name,$type)
    {
        $this -> title = $title;
        $this -> name = $name;
        $this -> type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
