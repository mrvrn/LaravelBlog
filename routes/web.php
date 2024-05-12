<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PagesController::class, 'home']);

Route::get('/articles/create', [ArticleController::class, 'create']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::delete('/articles/{id}', [ArticleController::class, 'destroy']);
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit']);
Route::put('/articles/{id}', [ArticleController::class, 'update']);
Route::post('/articles/{id}', [ArticleController::class, 'upload']);
Route::get('/articles/{id}/file', [ArticleController::class, 'file']);


Route::get('/authors/create', [AuthorController::class, 'create']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
Route::get('/authors/{id}/edit', [AuthorController::class, 'edit']);
Route::put('/authors/{id}', [AuthorController::class, 'update']);
Route::post('/authors/{id}', [AuthorController::class, 'upload']);
Route::get('/authors/{id}/file', [AuthorController::class, 'file']);

Route::get('/categories/create', [CategoryController::class, 'create']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::post('/categories/{id}', [CategoryController::class, 'upload']);
Route::get('/categories/{id}/file', [CategoryController::class, 'file']);

Route::get('/logout', [ProfileController::class, 'logout']);
Route::post('/upload', [FileController::class, 'upload']);

require __DIR__.'/auth.php';
