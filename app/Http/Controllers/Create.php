<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title, $details, $check;

    public function submit()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $this->check = Post::create($validatedData);

        if ($this->check) {
            $this->check = "Insert Success!";
            return $this->check;
        }
    }

    public function render()
    {
        return view('create');
    }
}
