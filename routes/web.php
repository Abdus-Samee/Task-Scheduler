<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleTaskMail;
use App\Http\Controllers\TaskController;

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
});

Route::get('/addTask', [TaskController::class, 'index'])->middleware('auth');

Route::post('/addTask', [TaskController::class, 'schedule'])->middleware('auth');

// Route::get('/schedule', function(){
//     Mail::to('abdussamee16@gmail.com')->later(now()->addSeconds(5), new ScheduleTaskMail());

//     return view('temp');
// });

Route::get('/tasks/complete/{id}', [TaskController::class, 'complete'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
