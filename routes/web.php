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
    return redirect("login");
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_post');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/list', [\App\Http\Controllers\ListController::class, 'index'])->name('list');
Route::get('/list/city', [\App\Http\Controllers\ListController::class, 'findOfficeFromCity'])->name('city_office_code');
Route::get('/list/office', [\App\Http\Controllers\ListController::class, 'findOfficeFromCity'])->name('city_office_code');
Route::get('/list/electors', [\App\Http\Controllers\ListController::class, 'listElectors'])->name('list_electors');
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/map', [\App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::get('/elector/edit/{id}', [\App\Http\Controllers\ElectorController::class, 'edit'])->name('edit_elector');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
});
