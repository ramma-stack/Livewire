<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;

class Photoupload extends Component
{

    use WithFileUploads;

    public $photos;

    public function save()
    {
        $this->validate([
            'photos.*' => 'mimes:jpg,png',
        ]);

        foreach ($this->photos as $photo) {

            //get file extension
            $extension = $photo->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = rand() . '.' . $extension;

            $photo->storeAs('photos/hd', $fileNameToStore, 'host');
            $photo->storeAs('photos/sd', $fileNameToStore, 'host');

            //Resize image here
            $thumbnailpath = public_path('upload/photos/sd/' . $fileNameToStore);
            Image::make($thumbnailpath)->save($thumbnailpath, 10);
        }

        return dd('success');
    }

    public function render()
    {
        return view('photoupload');
    }
}
