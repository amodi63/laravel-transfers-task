<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/trasfers', [TransferController::class, 'index'])->name('transfers.index');
Route::get('transfers/list/datatable', [TransferController::class, 'datatable'])->name('transfers.datatable');
Route::get('/create-transfer', [TransferController::class, 'create'])->name('transfers.create');
Route::post('/transfers/store', [TransferController::class, 'store'])->name('transfers.store');
Route::get('/transfers/export-transfers', [TransferController::class, 'exportTransfers'])->name('transfers.export.excel');
Route::delete('/transfers/{transfer}/delete', [TransferController::class, 'destroy'])->name('transfers.destroy');