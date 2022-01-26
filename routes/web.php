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
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/reset_password', [\App\Http\Controllers\AuthController::class, 'setNewPassword'])->name('reset_password');
Route::post('/new_password', [\App\Http\Controllers\AuthController::class, 'setNewPasswordPost'])->name('reset_password_post');
Route::get('/forgotten_password', [\App\Http\Controllers\AuthController::class, 'forgottenPassword'])->name('forgotten_password');
Route::post('/send_forgotten_password', [\App\Http\Controllers\AuthController::class, 'forgottenPasswordPost'])->name('forgotten_password_post');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/user/update/', [\App\Http\Controllers\UserController::class, 'update'])->name('update_user');
    Route::get('/user/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
    Route::get('/user/delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete_user');
    Route::post('/user/add', [\App\Http\Controllers\UserController::class, 'add_post'])->name('add_user_post');
    Route::get('/user/add', [\App\Http\Controllers\UserController::class, 'add'])->name('add_user');

    Route::get('/admin/maintenance', [\App\Http\Controllers\MaintenanceController::class, 'index'])->name('maintenance');
    Route::post('/admin/maintenance/update', [\App\Http\Controllers\MaintenanceController::class, 'update'])->name('update_maintenance');


    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/list', [\App\Http\Controllers\ListController::class, 'index'])->name('list');
    Route::get('/list/office', [\App\Http\Controllers\ListController::class, 'findOfficeFromCity'])->name('list_offices');
    Route::get('/list/electors', [\App\Http\Controllers\ListController::class, 'listElectors'])->name('list_electors');
    Route::get('/map', [\App\Http\Controllers\MapController::class, 'index'])->name('map');
    Route::get('/elector/edit/{id}', [\App\Http\Controllers\ElectorController::class, 'edit'])->name('edit_elector');
    Route::post('/elector/update/', [\App\Http\Controllers\ElectorController::class, 'update'])->name('update_elector');

    Route::get('/electors/export', [\App\Http\Controllers\ListController::class, 'exportCSV'])->name('export_electors');
});
