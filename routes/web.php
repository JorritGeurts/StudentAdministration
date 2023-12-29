<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CoursesOverview;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/','homepage')->name('homepage');

Route::get('course-overview',CoursesOverview::class)->name('course-overview');

Route::get('course',function(){
    return view('courses');
});
Route::view('course','courses')->name('course');

Route::view('under-construction', 'under-construction')->name('under-construction');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
