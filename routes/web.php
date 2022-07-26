<?php

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
    return redirect()->route('login');
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => 'auth'
], function () {
   Route::get('/', \App\Http\Controllers\Dashboard\HomeController::class)->name('index');
   Route::resource('/banks', \App\Http\Controllers\Dashboard\BankController::class);
   Route::resource('/mutations', \App\Http\Controllers\Dashboard\MutationController::class);
   Route::resource('/apis', \App\Http\Controllers\Dashboard\ApiController::class);

   Route::group([
       'prefix' => 'admin',
       'as' => 'admin.',
       'middleware' => 'isAdmin'
   ], function () {
       Route::resource('/users', \App\Http\Controllers\Dashboard\Admin\UserController::class);
   });
});

require __DIR__.'/auth.php';
