<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CustomerController;

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
    Route::get('', [CustomerController::class, 'getCustomers'])->name('customers');
    Route::get('add', [CustomerController::class, 'getAddCustomer'])->name('add-customer');
    Route::post('add', [CustomerController::class, 'postAddCustomer'])->name('add-customer');
    Route::get('edit', [CustomerController::class, 'getEditCustomer'])->name('edit-customer');
    Route::put('edit', [CustomerController::class, 'postUpdateCustomer'])->name('edit-customer');
    Route::delete('delete/{id}', [CustomerController::class, 'postDeleteCustomer'])->name('delete-customer');
});

Route::group(['prefix' => 'packages'], function() {
    Route::get('', [PackageController::class, 'getPackages'])->name('package');
Route::get('add', [PackageController::class, 'getAddPackage'])->name('add-package');
Route::post('add', [PackageController::class, 'postAddPackage'])->name('add-package');
Route::delete('delete/{id}', [PackageController::class,'deletePackage'])->name('delete-package');
});


