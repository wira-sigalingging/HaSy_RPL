<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrowseBarangController;
use App\Http\Controllers\ChangePasswordController;

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

Route::get('/', [AuthController::class, 'landing'])->name('/');



Route::get('account', function () {
    return view('Pages.Account');
})->name('account')->middleware('account');

Route::get('service', function () {
    return view('Pages.Browse_jasa');
})->name('service');

Route::get('shop', [BrowseBarangController::class, 'browseall'])->name('shop');

Route::get('service', [BrowseBarangController::class, 'browsejasa'])->name('service');


Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('payment', [AuthController::class, 'payment'])->name('payment');

Route::get('cart', [AuthController::class, 'cart'])->name('cart');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::resource('barang', BarangController::class);

Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
