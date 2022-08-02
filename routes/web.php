<?php

use Illuminate\Support\Facades\Route;

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
//Home Routes
Auth::routes();
Route::get('/', function (){
    return redirect('/chatify');
})->name('home');

Route::get('/home', function (){
    return redirect('/chatify');
})->name('home');

Route::post('/viewNotification', [App\Http\Controllers\Notification::class, 'viewNotification'])->name('viewNotification');
Route::get('/grid', [App\Http\Controllers\HomeController::class, 'grid'])->name('grid');

//User Routes
Route::get('/configuration', [App\Http\Controllers\User::class, 'configuration'])->name('configuration');
Route::post('/upload', [App\Http\Controllers\User::class, 'upload'])->name('upload');
