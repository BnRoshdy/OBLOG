<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;
use App\Http\Controllers\commentController;

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

Route::get('/home', function () {
    dd(\Illuminate\Support\Facades\Auth::user());
})->middleware(['auth', 'verified']);




Route::get('/',[postsController::class , 'index']);

Route::get('/PostPage/{id}',[postsController::class , 'show']);

Route::get('/create',[postsController::class , 'create']);
Route::post('/create',[postsController::class , 'store']);  

Route::post('/comment',[commentController::class , 'show']);
Route::post('/comment',[commentController::class , 'store'])->name('ahmed');


