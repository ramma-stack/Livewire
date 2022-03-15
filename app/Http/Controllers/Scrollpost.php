<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Livewire\Component;

class Scrollpost extends Component
{

    public $listeners = ['loadMore'];

    public $limit = 10;

    public function loadMore($addLimit)
    {
        $this->limit += $addLimit;
    }

    public function render()
    {
        $array = [
            'posts' => Post::latest()->paginate($this->limit),
        ];
        return view('scrollpost', $array);
    }
}
