<?php

use App\Http\Controllers\D24Controller;
use App\Http\Controllers\FixerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookStoreController;
use App\Http\Controllers\OutfitController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/d24', [D24Controller::class, 'form'])->name('d24_form');
Route::post('/d24', [D24Controller::class, 'formSubmit'])->name('d24_form_submit');

Route::get('/fixer', [FixerController::class, 'form'])->name('fixer_form');
Route::post('/fixer', [FixerController::class, 'formSubmit'])->name('fixer_form_submit');

Route::get('/knygos', [BookController::class, 'showList'])->name('books');

Route::get('/books-store', [BookStoreController::class, 'showList'])->name('books-store');
Route::get('/books-store/show-{id}', [BookStoreController::class, 'showBook'])->name('books_store_show_book');

Route::get('/outfits', [OutfitController::class, 'showList'])->name('outfits');
Route::get('/outfits/show-{id}', [OutfitController::class, 'showOutfit'])->name('outfits_show_outfit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
