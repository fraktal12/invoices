<?php

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

// only authenticated users can access the site
Route::middleware(['auth'])->group(function () {
    Route::resource('invoices','InvoiceController');
    Route::get('invoices/{invoice}/pdf', 'InvoiceController@printPDF')->name('invoices.download');
});

Route::get('/home', 'InvoiceController@index')->name('invoices');



