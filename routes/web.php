<?php

use App\Http\Controllers\EbookCategoryController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('web.index');
// });

Route::get('/', [PublicController::class, 'index'])->name('index');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'ebook/category'], function () {
        Route::get('list', [EbookCategoryController::class, 'index'])->name('ebook.category.list');
        Route::post('store', [EbookCategoryController::class, 'store'])->name('ebook.category.store');
        Route::delete('delete/{id}', [EbookCategoryController::class, 'destroy'])->name('ebook.category.destroy');
    });

    Route::group(['prefix' => 'ebook'], function () {
        Route::get('list', [EbookController::class, 'index'])->name('ebook.list');
        Route::get('search', [EbookController::class, 'search'])->name('ebook.search');
        Route::get('create', [EbookController::class, 'create'])->name('ebook.create');
        Route::post('store', [EbookController::class, 'store'])->name('ebook.store');
        Route::get('edit/{id}', [EbookController::class, 'edit'])->name('ebook.edit');
        Route::delete('delete/{id}', [EbookController::class, 'destroy'])->name('ebook.destroy');
    });
});
