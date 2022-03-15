<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['lang'])->group(function () {

    Route::get('language', \App\Http\Controllers\Language::class)->name('language');
});

Route::get('/', App\Http\Controllers\Welcome::class)->name('/');

Route::get('photoupload', \App\Http\Controllers\Photoupload::class)->name('photoupload');

Route::get('paginate', \App\Http\Controllers\Paginate::class)->name('paginate');

Route::get('scrollpost', \App\Http\Controllers\Scrollpost::class)->name('scrollpost');


Route::get('/{post}', \App\Http\Controllers\Showpost::class)->name('showpost');
