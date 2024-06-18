<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;




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

Route::get('/',[HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get ('/home', [AdminController::class, 'index']);
Route::get ('/category_page', [AdminController::class, 'category_page']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get ('/cat_delete/{id}', [AdminController::class, 'cat_delete']);
Route::get('/edit_update/{id}', [AdminController::class, 'edit_update']);
Route::post('/update_category/{id}', [AdminController::class, 'update_category']);



// Rute logout menggunakan metode POST
// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->name('logout');