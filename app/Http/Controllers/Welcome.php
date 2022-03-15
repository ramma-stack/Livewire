<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Livewire\Component;

class Welcome extends Component
{
    public $items = 20, $search;

    protected $queryString = [
        'search' => ['except' => 'porn'],
    ];

    public function viewMore()
    {
        $this->items += 20;
    }

    public $title, $details;
    public function int(post $id)
    {
        $this->title = $id->title;
        $this->details = $id->details;
    }

    public function submit(post $id)
    {

        $validatedData = $this->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $id->update($validatedData);
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post successfully deleted!.');
    }

    public $readyToLoad = false;

    public function loadPosts()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $arr = [
            'posts' => Post::where('title', 'LIKE', '%' . $this->search . '%')->latest()->paginate($this->items),
        ];

        return view('welcome', $arr);
    }
}
