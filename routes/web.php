<?php

use App\Http\Controllers\MemoController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/memo', [MemoController::class, 'index'])->name('memo.index');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/memo/store', [MemoController::class, 'store'])->name('memo.store');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/memo/select', [MemoController::class, 'select'])->name('memo.select');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/memo/update', [MemoController::class, 'update'])->name('memo.update');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/memo/delete', [MemoController::class, 'delete'])->name('memo.delete');
