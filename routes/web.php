<?php

use App\Http\Controllers\CategoryController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardForumController;

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
    return redirect('/login');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'questions' => Question::latest()->filter(request(['search']))->get()
    ]);
})->middleware('auth');

// my forum
Route::resource('/dashboard/forum', ForumController::class)->middleware('auth');
Route::get('/dashboard/checkslug', [ForumController::class, 'checkSlug']);

// comment
Route::resource('/dashboard/comment', CommentController::class);

// profile
Route::resource('/dashboard/profile', UserController::class)->middleware('auth');


// categories
Route::resource('/dashboard/categories', CategoryController::class)->except('show')->middleware('admin');
