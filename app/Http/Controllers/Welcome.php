<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\Post;

class Welcome extends Component
{
    public $items = 20;

    public function viweMore()
    {
        $this->items += 20;
    }

    public function render()
    {
        $arr = [
            'posts' => Post::paginate($this->items)
        ];

        return view('welcome', $arr);
    }
}
