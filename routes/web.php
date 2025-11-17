<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/{slug}', [HomeController::class, 'showProject'])->name('project.show');
Route::get('/posts/{slug}', [HomeController::class, 'showPost'])->name('post.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Khusus Admin (WAJIB LOGIN)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Daftarkan Rute CRUD Projects kita di sini
    Route::resource('projects', ProjectController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);

    // (Nanti kita tambahkan rute CRUD Blog & Settings di sini)
});

require __DIR__.'/auth.php';
