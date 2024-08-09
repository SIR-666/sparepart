<?php

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\partController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qc_checkController;
use App\Http\Controllers\sparepartController;

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

Route::resource('cs',qc_checkController::class);
Route::resource('spms',sparepartController::class); 

// Route::delete('/qc_cheksheet/{id}', [qc_checkController::class, 'destroy']);
Route::get('cs-test',[qc_checkController::class,'test']); 

Route::get('part', [partController::class, 'index']);
Route::get('spms', [sparepartController::class, 'index']);

Route::prefix('auth')->group(function () {
    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/sso/{token}', 'sso')->name('sso');
        Route::post('/logout', 'logout')->name('logout');
    });
}); 
// Route::get('/get-material/{product_name}', [qc_checkController::class, 'getMaterial'])->name('get.material');
Route::get('/get-product-details', [qc_checkController::class, 'getProductDetails'])->name('getProductDetails');

