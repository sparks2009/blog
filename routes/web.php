<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\http\Controllers\PostCommentController;
use App\http\Controllers\AdminPostController;
use App\Services\Newsletter;



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

Route::get('categories/{category:slug}', [PostController::class, 'index']);

Route::get('authors/{author:username}', [PostController::class, 'index']);

Route::post('newsletter', NewsletterController::class);

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']); 

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');

Route::get('admin/{post:id}', [AdminPostController::class, 'edit'])->middleware('admin');

Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');

Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin');




