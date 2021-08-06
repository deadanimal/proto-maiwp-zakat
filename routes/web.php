<?php
use App\Http\Controllers\LaporanSejarahController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\PenerimaZakatController;
use App\Http\Controllers\PungutanZakatController;
use App\Http\Controllers\FailController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
// ->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('laporansejarahs',LaporanSejarahController::class);

Route::resource('fails',FailController::class);

Route::resource('penerimazakats',PenerimaZakatController::class);

Route::resource('pungutanzakats',PungutanZakatController::class);

Route::resource('merchants',MerchantController::class);


