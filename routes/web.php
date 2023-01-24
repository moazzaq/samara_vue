<?php

use App\Http\Controllers\LivePostController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('country', [PostController::class , 'country']);
Route::get('getCountries', [PostController::class , 'getCountries']);
Route::get('getStates', [PostController::class , 'getStates']);

Route::get('live-post', [LivePostController::class , 'index']);
Route::get('live-post/create', [LivePostController::class , 'create'])->name('posts.create');
Route::get('live-post/{post}/edit', [LivePostController::class , 'edit'])->name('posts.edit');

