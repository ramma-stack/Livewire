<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Livewire\Component;

class Welcome extends Component
{
    public $items = 20, $search;

    public function viewMore()
    {
        $this->items += 20;
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post successfully deleted!.');
    }

    public function render()
    {
        $arr = [
            'posts' => Post::where('title', 'LIKE', '%' . $this->search . '%')->latest()->paginate($this->items),
        ];

        return view('welcome', $arr);
    }
}
