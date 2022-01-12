<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\SurveyController;

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

Route::get("/user/{user_id}", [
    UserController::class, 'getUser'
])->name('user');

Route::group(['middleware' => 'auth'], function ()
{
    Route::post('/createvote', [
        PostController::class,'postCreateVote'
    ])->name('post.create.vote');
    Route::get('/delete-post/{post_id}', [
        PostController::class,'getDeletePost'
    ])->name('post.delete');

    Route::post('/createsurvey', [
        SurveyController::class, 'createSurvey'
    ])->name('survey.create');

    Route::post('/deletesurvey', [
        SurveyController::class, 'deleteSurvey'
    ])->name('survey.delete');

    Route::post('/editsurvey', [
        SurveyController::class, 'editSurvey'
    ])->name('survey.edit');

    Route::post('/takesurvey', [
        SurveyController::class, 'takeSurvey'
    ])->name('survey.take');

    Route::get('/dashboard/surveys', [
        SurveyController::class, 'getSurveys'
    ])->name('survey.all');


    Route::get('create_survey', function ()
    {
        return view('survey');
    })->name('create.survey');
});

Route::post('/edit', [
    PostController::class,'postEditPost',
])->name('edit');

Route::post('/vote', [
    PostController::class,'postVotePost'
])->name('vote');

Route::get('leaderboard', [
     PostController::class, 'getLeaderboard'
])->name('leaderboard');

Route::get('create_vote', function ()
{
    return view('vote');
})->name('create.vote');




