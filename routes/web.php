<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('invoices', InvoiceController::class);


Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::get('/invoice/{id}/delete', [InvoiceController::class, 'show'])->name('invoice.show');
Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');