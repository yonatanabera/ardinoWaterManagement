<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestController;
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

Route::resource('testAjax', TestController::class);

Route::get('yoni', function(){
    return view('gelu');
});


Route::resource('customer', RegistrationController::class);
Route::get('customerList', [RegistrationController::class, 'lists'])->name('customerList');
Route::post('searchCustomer', [RegistrationController::class, 'searchCustomer'])->name('searchCustomer');