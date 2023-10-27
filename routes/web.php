<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RouteController;
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
//Route
Route::get('/', [RouteController::class, 'home'])->name('home');
Route::get('/dashboard/books', [RouteController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/authors', [RouteController::class, 'authorsDash'])->name('authors.dashboard');
Route::get('/dashboard/categories', [RouteController::class, 'categoriesDash'])->name('categories.dashboard');
Route::get('/dashboard/user-profile', [RouteController::class, 'profile'])->name('profile');
Route::get('/dashboard/user-profile/edit', [RouteController::class, 'profileEdit'])->name('user.edit');
Route::get('/dashboard/user-profile-social/edit', [RouteController::class, 'socialEdit'])->name('social.edit');
Route::put('/dashboard/user-profile/update', [RouteController::class, 'profileUpdate'])->name('user.update');
Route::put('/dashboard/user-social/update', [RouteController::class, 'socialUpdate'])->name('social.update');
//Route CRUD
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);