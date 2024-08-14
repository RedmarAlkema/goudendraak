<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlantController;

Route::get('/', function () {
    return view('index');
});

Route::get('/paginas/aanbiedingen', function () {
    return view('paginas.aanbiedingen');
})->name('aanbiedingen');

Route::get('/paginas/MENUKAART', function () {
    return view('paginas.MENUKAART');
})->name('menukaart');

Route::get('/paginas/news', function () {
    return view('paginas.news');
})->name('news');

Route::get('/paginas/contact', function () {
    return view('paginas.contact');
})->name('contact');

Route::get('/paginas/contact_new', function () {
    return view('paginas.contact_new');
})->name('contact_new');

Route::get('/bestellen', [KlantController::class, 'index'])->name('cart.index');
Route::post('/store', [KlantController::class, 'store'])->name('cart.store');
Route::get('/cart/count', [KlantController::class, 'cartItemCount']);
