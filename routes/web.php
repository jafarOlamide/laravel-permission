<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JoinController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {


    Route::get('join', [JoinController::class, 'create'])->name('join.create');
    Route::post('join', [JoinController::class, 'store'])->name('join.store');

    Route::get('organizations/{organization_id}', [JoinController::class, 'organization'])->name('organization');

    Route::resource('articles', ArticleController::class);
    Route::view('invite', 'invite')->name('invite');

    Route::middleware(['is_admin'])->group(function () {
        Route::resource('categories', CategoryController::class);
    });
});
