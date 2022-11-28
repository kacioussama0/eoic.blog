<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $choices = [];
    public $name;
    public $title
    ;
    public function __construct($choices,$name,$title)
    {
        $this -> title = $title;
        $this -> name = $name;
        $this -> choices = $choices;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
