<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Paginate extends Component
{

    use WithPagination;

    public $search;
    protected $queryString = [
        'search' => ['except' => 'ramyar'],
    ];

    public function alert()
    {
        notyf()->livewire()->position('y', 'top')->position('x', 'left')->addError('Hello World!');
    }

    public function paginationView()
    {
        return 'tailwind';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Post $id)
    {
        $id->delete();
    }

    public function render()
    {
        $array = [
            'posts' => Post::where('title', 'LIKE', '%' . $this->search . '%')->latest()->paginate(9),
        ];
        return view('paginate', $array);
    }
}
