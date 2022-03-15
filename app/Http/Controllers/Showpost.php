<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Livewire\Component;

class Showpost extends Component
{

    public Post $post;

    public function render()
    {
        return view('showpost', $this->post);
    }
}
