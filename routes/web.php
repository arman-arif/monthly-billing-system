<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

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

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'customers'], function() {
    Route::get('', [Controllers\CustomerController::class, 'getCustomers'])->name('customers');
});

Route::group(['prefix' => 'packages'], function() {
    Route::get('', [PackageController::class, 'getPackages'])->name('package');
Route::get('add', [PackageController::class, 'getAddPackage'])->name('add-package');
Route::post('add', [PackageController::class, 'postAddPackage'])->name('add-package');
Route::delete('delete/{id}', [PackageController::class,'deletePackage'])->name('delete-package');
});


