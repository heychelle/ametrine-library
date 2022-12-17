<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

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

Route::resource('books', BookController::class);
Route::resource('users', UserController::class);
Route::resource('magazines', MagazineController::class);

Route::get('/borrows', [BorrowController::class, 'index']);
Route::post('/borrow/{id}', [BorrowController::class, 'borrow']);
Route::post('/accept/{id}', [BorrowController::class, 'accept']);
Route::post('/cancel/{id}', [BorrowController::class, 'cancel']);
Route::get('/log', [BorrowController::class, 'log']);
Route::get('/mybook', [BorrowController::class, 'mybook']);

// Route::get('/', function(){
//     $book = Book::create([
//         'user_id' => 1,
//         'name' => 'Sherlock',
//         'genre' => '1',
//         'status' => '0',
//     ]);
//     $book->reviews()->create([
//         'user_id' => 1,
//         'review' => "this is review for sherlock book"
//     ]);
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
