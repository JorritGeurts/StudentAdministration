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

Route::get('/', function () {
    return view('homepage');
});
Route::view('/','homepage')->name('homepage');

Route::get('courses-overview',CoursesOverview::class)->name('courses-overview');

Route::get('courses',function(){
    return view('courses');
});
Route::view('courses','courses')->name('courses');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
