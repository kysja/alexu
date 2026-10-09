<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/work', 'Work')->name('work');
Route::inertia('/notes', 'Notes')->name('notes');
Route::inertia('/lab', 'Lab')->name('lab');
Route::inertia('/resume', 'Resume')->name('resume');
Route::inertia('/contact', 'Contact')->name('contact');
