<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\AunthControler;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookRentControler;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControler;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AunthControler::class, 'login'])->name('login');
    Route::post('login', [AunthControler::class, 'authenticating']);
    Route::get('register', [AunthControler::class, 'register']);
    Route::post('register', [AunthControler::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AunthControler::class, 'logout']);

    Route::get('profile', [UserControler::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {

        Route::get('dashboard', [DashboardControler::class, 'index']);

        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book-deleted', [BookController::class, 'deletedBook']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);


        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserControler::class, 'index']);
        Route::get('registered-user', [UserControler::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserControler::class, 'show']);
        Route::get('user-approve/{slug}', [UserControler::class, 'approve']);
        Route::get('user-ban/{slug}', [UserControler::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserControler::class, 'destroy']);
        Route::get('user-banned', [UserControler::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserControler::class, 'restore']);

        Route::get('book-rent', [BookRentControler::class, 'index']);
        Route::post('book-rent', [BookRentControler::class, 'store']);

        Route::get('rentLog', [RentLogController::class, 'index']);

        Route::get('book-renturn', [BookRentControler::class, 'returnBook']);
        Route::post('book-renturn', [BookRentControler::class, 'saveReturnBook']);
    });
});
