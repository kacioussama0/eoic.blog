<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $title ;
    public $name;
    public $type;
    public $value;

    public function __construct($title,$name,$type,$value)
    {
        $this -> title = $title;
        $this -> name = $name;
        $this -> type = $type;
        $this -> value = $value;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.input');
    }
}
