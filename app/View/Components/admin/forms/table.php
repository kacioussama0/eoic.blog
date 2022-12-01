<?php

namespace App\View\Components\admin\forms;

use Illuminate\View\Component;

class table extends Component
{
    public $objects ;
    public $thead;
    public $tbody;
    public $deletePath;
    public $editPath;

    public function __construct($objects,$thead,$tbody,$deletePath,$editPath)
    {
        $this -> objects = $objects;
        $this -> thead = $thead;
        $this -> tbody = $tbody;
        $this -> deletePath = $deletePath;
        $this -> editPath = $editPath;
    }


    public function render()
    {
        return view('components.admin.forms.table');
    }
}
