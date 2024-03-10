<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/reg', function () {
    return view('reg');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/profile', [UserController::class, 'profile']);

Route::post('/editPhone', [UserController::class, 'editPhone']);

Route::post('/editEmail', [UserController::class, 'editEmail']);

Route::get('/addPost', [PostController::class, 'addPost']);

Route::post('/storePost', [PostController::class, 'storePost']);

Route::get('/moder', [UserController::class, 'moder']);

Route::get('/acceptPost/{id}', [UserController::class, 'acceptPost']);

Route::get('/offPost/{id}', [UserController::class, 'offPost']);

Route::get('/arhivePost/{id}', [UserController::class, 'arhivePost']);

Route::post('/findPost', [PostController::class, 'findPost']);

Route::get('/detailPost/{id}', [PostController::class, 'detailPost']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/addComment', [UserController::class, 'addComment']);

Route::get('/postDelete/{id}', [PostController::class, 'postDelete']);

Route::get('/postEdit/{id}', [PostController::class, 'postEdit']);

Route::post('/updatePost', [PostController::class, 'updatePost']);
