<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    //admin panel routes
    Route::resource('posts', PostController::class)->only(['index','show','store','update']);
    Route::get('/post/new', [PostController::class, 'newPost'])->name('new-post');;

    Route::middleware(['check.permissions:all'])->group(function () {
        //admin functions
        //user management
        Route::resource('users', UserController::class)->only(['index','show','store','update','destroy']);
        
        //post management
        Route::resource('posts', PostController::class)->only(['destroy']);
        //can update post to feature them, accept/reject them etc
        Route::post('/posts-update', [PostController::class, 'postUpdate']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function () {
        return auth()->user();
    });
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::controller(BlogController::class)->group(function(){
    Route::get('/',[BlogController::class, 'index']);
    // Route::get('/index', [BlogController::class, 'index']);
    Route::get('/blog/post/{post_id}', [BlogController::class, 'show']);
    Route::get('/blog/search', [BlogController::class, 'search']);  
    Route::get('/blog/related', [BlogController::class, 'related']);
    Route::get('/disclaimer', function () {
        return view('disclaimer'); 
    });
    Route::get('/fact-checking', function () {
        return view('fact');
    });
    Route::get('/terms-and-conditions', function () {
        return view('terms'); 
    });
    Route::get('/copyright', function () {
        return view('copyright'); 
    });
    Route::get('/privacy-policy', function () {
        return view('privacy');
    });
});



// Route::get('/view', function () {
//     return view('view-post');
// });


