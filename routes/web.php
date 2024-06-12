<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;;
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


//HOME
Route::get('/', [HomeController::class, 'index']);
Route::get('/book_details/{id}', [HomeController::class, 'book_details']);
Route::get('/borrow_books/{id}', [HomeController::class, 'borrow_books']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/home', [AdminController::class, 'index'])->middleware(['auth','admin']);


//Category
Route::get('/category_page', [AdminController::class, 'category_page'])->middleware(['auth','admin']);
Route::post('/add_category', [AdminController::class, 'add_category'])->middleware(['auth','admin']);
Route::get('/cat_delete/{id}', [AdminController::class, 'cat_delete'])->middleware(['auth','admin']);
Route::get('/edit_cat/{id}', [AdminController::class, 'edit_cat'])->middleware(['auth','admin']);
Route::post('/update_cat/{id}', [AdminController::class, 'update_cat'])->middleware(['auth','admin']);

//Books
Route::get('/add_book', [AdminController::class, 'add_book'])->middleware(['auth','admin']);
Route::post('/store_book', [AdminController::class, 'store_book'])->middleware(['auth','admin']);
Route::get('/show_book', [AdminController::class, 'show_book'])->middleware(['auth','admin']);
Route::get('/delete_book/{id}', [AdminController::class, 'delete_book'])->middleware(['auth','admin']);
Route::get('/edit_book/{id}', [AdminController::class, 'edit_book'])->middleware(['auth','admin']);
Route::post('/update_book/{id}', [AdminController::class, 'update_book'])->middleware(['auth','admin']);


Route::get('/borrow_request', [AdminController::class, 'borrow_request'])->middleware(['auth','admin']);


Route::get('/approve_b/{id}', [AdminController::class, 'approve_b'])->middleware(['auth','admin']);
Route::get('/reject_b/{id}', [AdminController::class, 'reject_b'])->middleware(['auth','admin']);
Route::get('/returned_b/{id}', [AdminController::class, 'returned_b'])->middleware(['auth','admin']);


Route::get('/book_histoire', [HomeController::class, 'book_histoire']);


Route::get('/cancel_req/{id}', [HomeController::class, 'cancel_req']);

Route::get('/explore', [HomeController::class, 'explore']);




