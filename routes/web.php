<?php

use App\Http\Controllers\QRController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/payments', function () {
        return view('payment');
    })->name('payment');
    Route::get('/appointment', function () {
        return view('appointment');
    })->name('appointment');
    Route::get('payment/{id}', [QRController::class, 'generateQRAndPDF'])->name('payment.pdf');
    Route::get('export/payes', [ExcelController::class, 'generateExcel'])->name('payment.excel');
    Route::get('appointment/show', [EventController::class, 'index'])->name('events.show');
});

