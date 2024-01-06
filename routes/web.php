<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::view('/home','home')->name('home');

    Route::resource('discussions', DiscussionController::class);
    Route::post('/discussions/{discussion}/close', 'App\Http\Controllers\DiscussionController@close')->name('discussions.close');


    Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories.index');
    Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');

    Route::resource('categories', CategoryController::class)->except(['show','index'])->middleware(IsAdmin::class);
    
    Route::controller(CommentController::class)->prefix('/discussions/comment')->name('comments.')->group(function(){
        Route::post('/{discussion}', 'store')->name('store');
        Route::get('/{comment}', 'edit')->name('edit');
        Route::put('/{comment}', 'update')->name('update');
        Route::delete('/{comment}', 'destroy')->name('destroy');
    });

    Route::controller(UserController::class)->prefix('/users')->name('users.')->group(function(){
        Route::get('/','index')->name('index');
    });
});

require __DIR__  . '/auth.php';