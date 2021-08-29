<?php

use App\Models\book;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/books', function () {
    $validator = Validator::make($request->all(), [
        'item_name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/books')
            ->withInput()
            ->withErrors($validator);
    }

    return view('books');
})->name('books');

Route::post('/books', function (Request $request) {
});

Route::delete('/book/{book}', function (Book $book) {
});
