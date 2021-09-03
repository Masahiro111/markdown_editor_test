<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\TestController;
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

Route::get('/markdown', function () {
    return view('markdown');
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


// ----------------------------------------------------

Route::get('/test', [TestController::class, 'index']);

Route::get('/test/create', [TestController::class, 'create']);

Route::post('/test', [TestController::class, 'store']);

Route::get('/test/{id}/edit', [TestController::class, 'edit']);

Route::put('/test/{id}', [TestController::class, 'update']);

Route::delete('users/{id}', [TestController::class, 'delete']);

// ----------------------------------------------------

Route::get('/sample', [SampleController::class, 'index'])->name('index');

Route::get('/sample/create', [SampleController::class, 'create'])->name('create');

Route::post('/sample', [SampleController::class, 'store'])->name('store');

Route::get('/sample/{id}/edit', [SampleController::class, 'edit'])->name('edit');

Route::put('/sample/{id}', [SampleController::class, 'update'])->name('update');

Route::delete('/sample/{id}', [SampleController::class, 'destroy'])->name('delete');

// ----------------------------------------------------

Route::get('/crud', [CrudController::class, 'index']);

Route::get('/crud/create', [CrudController::class, 'create']);

Route::post('/crud', [CrudController::class, 'store']);

Route::get('/crud/{id}/edit', [CrudController::class, 'edit']);

Route::put('/crud/{id}', [CrudController::class, 'update']);

Route::delete('/crud/{id}', [CrudController::class, 'delete']);
