<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\ContactController;

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
    $projects = \App\Models\Project::all();
    
    return view('index')
        ->with(['projects'=>$projects]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth'], function(){
    Route::resource('projects', ProjectController::class);
});

Route::group(['middleware'=>'auth'], function(){
    Route::resource('contacts', ContactController::class);
});

require __DIR__.'/auth.php';
