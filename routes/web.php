<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\PostController;

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
    return view('login');
})->name('home');

Route::post('/register', [UserController::class, 'postRegister'])->name('registerControl');

Route::post('/login', [UserController::class, 'postLogin'])->name('loginControl');

Route::get('login', function ()
{
   return view('login');
})->name('login');

Route::get('register', function ()
{
   return view('register');
})->name('register');

Route::get('/logout', [UserController::class, 'getLogout'])->name('logout');

Route::get('/account', [UserController::class, 'getAccount'])->name('account');

Route::post('/updateaccount', [UserController::class, 'postSaveAccount'])->name('account.save');

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);

Route::get('/dashboard', [
    PostController::class, 'getDashboard'
])->name('dashboard');

Route::group(['middleware' => 'auth'], function ()
{
    Route::post('/createpost', [
        PostController::class,'postCreatePost'
    ])->name('post.create');
    Route::get('/delete-post/{post_id}', [
        PostController::class,'getDeletePost'
    ])->name('post.delete');
});
Route::post('/edit', [
    PostController::class,'postEditPost',
])->name('edit');
Route::post('/vote', [
    PostController::class,'postVotePost'
])->name('vote');




