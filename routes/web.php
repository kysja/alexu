<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WorkController;
use App\Support\SiteData;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/work', [WorkController::class, 'index'])->name('work');
// Section pages share the /work/{...} space with case studies, so they only match known section slugs.
Route::get('/work/{section}', [WorkController::class, 'section'])
    ->whereIn('section', array_column(SiteData::get('work_sections'), 'slug'))
    ->name('work.section');
Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');
Route::inertia('/notes', 'Notes')->name('notes');
Route::inertia('/lab', 'Lab')->name('lab');
Route::get('/resume', ResumeController::class)->name('resume');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
