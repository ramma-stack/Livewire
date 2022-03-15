<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Language extends Component
{

    public function download($filename)
    {
        return response()->download(public_path('upload/photos/sd/').$filename);
    }

    public function lang($value)
    {
        Cookie::queue('lang', $value, 99999999);
        $this->redirect('language');
    }

    public function render()
    {
        return view('language');
    }
}
