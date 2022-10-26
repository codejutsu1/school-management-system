<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    if(auth()->user()->name == 'Principal'){
        auth()->user()->assignRole('super admin');
    }else if(auth()->user()->name == 'Vice Principal')
    {
        auth()->user()->assignRole('vice principal');
    }else if(auth()->user()->name == 'Teacher')
    {
        auth()->user()->assignRole('teacher');
    }else if(auth()->user()->name == 'Student')
    {
        auth()->user()->assignRole('student');
    }else if(auth()->user()->name == 'Parent')
    {
        auth()->user()->assignRole('parent');
    }


    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('students', StudentController::class);
});

require __DIR__.'/auth.php';
