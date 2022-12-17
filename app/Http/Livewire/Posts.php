<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
   use  WithPagination;

    public $perPage = 5;
    public $showBtn = true;

    public function showMore() {
        $this->perPage += 5;
    }

    public function isVisible() {
        if(count(Post::all()) < $this->perPage) {
            $this->showBtn = false;
        }

        return $this->showBtn;
    }

    public function render()
    {
        return view('livewire.posts',['posts' => Post::latest()->paginate($this->perPage),'visible' => $this->isVisible()]);
    }
}
