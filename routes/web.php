<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UserPostController;

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
Route::group(['middleware'=> ['auth']],function(){

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::post ('/posts/createPosts',   [PostsController::class, 'createPost'])->name('createPost');
    Route::post('posts/likePost/{post}',[LikesController::class,'likesStore'])->name('likePost');
    Route::delete('posts/unlikePost/{post}',[LikesController::class,'unlikePost'])->name('unlikePost');
    Route::delete('posts/deletePost/{post}',[PostsController::class,'deletePost'])->name('deletePost');
    Route::get('users/{user:name}',[UserPostController::class,'index'])->name('userPost');
    Route::get('post/{post}', [PostsController::class, 'show'])->name('showPost');
});

Route::get ('posts',    [PostsController::class,           'index'])->name('posts');
Route::group(['middleware' => ['guest']],function(){
    Route::get ('/login',   [LoginController::class,           'index'])->name('login');
});

Route::view('/home', 'home')->name('home');
Route::view('/', 'home')->name('home');

Route::get ('/register',[RegisterController::class,        'index'])->name('register');
Route::post('/register',[RegisterController::class, 'registerUser'])->name('registerUser');
Route::post('/login',    [LoginController::class,           'login'])->name('login');
Route::post('/logout',    [LogoutController::class,           'logout'])->name('logout');


Route::get('ajax', [AjaxController::class, 'index']);
Route::get('refresh', [AjaxController::class, 'getData']);
Route::post('saveName',[AjaxController::class , 'saveName']);
Route::get('getRecord/{id}',[AjaxController::class , 'getRecord']);
Route::put('updateRecord/{id}',[AjaxController::class , 'updateRecord']);
Route::put('DeleteRecord/{id}',[AjaxController::class , 'deleteRecord']);









