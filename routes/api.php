<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth:sanctum'])->group(function () {
    //admin panel routes
    //integrate digital ocean for image hosting
    Route::resource('posts', PostController::class)->only(['index','show','store','update']);

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

Route::post('/login', [AuthController::class, 'login']);

Route::controller(BlogController::class)->group(function(){
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/post/{post_id}', [BlogController::class, 'show']);
    Route::get('/blog/search', [BlogController::class, 'search']);  
    Route::get('/blog/related', [BlogController::class, 'related']); 
});



// Route::get('/view', function () {
//     return view('view-post');
// });


*/