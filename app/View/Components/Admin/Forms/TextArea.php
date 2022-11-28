<?php

namespace App\View\Components\Admin\Forms;

use Illuminate\View\Component;

class TextArea extends Component
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
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.text-area');
    }
}
