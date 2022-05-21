<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Users;
use App\Http\controllers\profile;
use App\Http\controllers\UserProfile;
use App\Http\controllers\MyComments;
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
Route::get('/', function () {
    return view('Home');
});


Route::prefix('user')->middleware(['auth','verified'])->name('user.')->group(function () {  
    Route::get('/edit',[users::class , 'getdata'])->name('edit');
    Route::post('/edit',[users::class , 'postdata'])->name('edit');
    Route::get('/prof', [UserProfile::class , 'profiledata'])->name('profile') ;
    Route::get('/mycomments', [MyComments::class , 'commentdata'])->name('comments') ;
   // Route::get('/mycomments', function(){
    //    return view('user.mycomments');
   // });

    Route::get('/change_password',[profile::class , 'index'])->name('updadte_password');
    Route::post('/change_password',[profile::class , 'update_password'])->name('update_password');

});


Route::get('/home', function () {
    dd(\Illuminate\Support\Facades\Auth::user());
})->middleware(['auth', 'verified']);


Route::get('/',[postsController::class , 'index']);

Route::get('/PostPage/{id}',[postsController::class , 'show']);

Route::get('/create',[postsController::class , 'create']);
Route::post('/create',[postsController::class , 'store']);  

Route::post('/comment',[commentController::class , 'show']);
Route::post('/comment',[commentController::class , 'store'])->name('ahmed');