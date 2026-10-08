<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/brand-review', fn () => response()
    ->view('brand-review')
    ->header('X-Robots-Tag', 'noindex, nofollow, noarchive, nosnippet, noimageindex'))
    ->name('brand-review');

Route::get('/brand-review/round-2', fn () => response()
    ->view('brand-review-round-2')
    ->header('X-Robots-Tag', 'noindex, nofollow, noarchive, nosnippet, noimageindex'))
    ->name('brand-review.round-2');
