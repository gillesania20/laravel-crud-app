<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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
    //$posts = Post::all();
    //$posts = Post::where('user_id', auth()->id())->get();
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/create-post', [PostController::class, 'createPost']);

Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
