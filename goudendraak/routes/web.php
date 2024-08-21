<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ExcelController;

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
Route::get('/cart', [KlantController::class, 'cartIndex'])->name('cart.cart');
Route::post('/store', [KlantController::class, 'store'])->name('cart.store');
Route::get('/cart/count', [KlantController::class, 'cartItemCount']);
Route::post('/cart/update', [KlantController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [KlantController::class, 'removeItem'])->name('cart.remove');
Route::post('/store-table-number', [KlantController::class, 'storeTableNumber'])->name('cart.storeTableNumber');
Route::post('/checkout', [KlantController::class, 'checkout'])->name('cart.checkout');
Route::get('/thank-you', [KlantController::class, 'thankYou'])->name('cart.thankyou');

Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
Route::get('/tables/reserve/{id}', [TableController::class, 'reserve'])->name('tables.reserve');
Route::post('/tables/reserve/{id}', [TableController::class, 'storeReservation'])->name('tables.reserve.store');
Route::post('/tables/finalize/{id}', [TableController::class, 'finalizePayment'])->name('tables.finalize');

Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu');
Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');

Route::get('/sales/export/',[ExcelController::class, 'export'])->name('admin.export');
Route::get('/sales/index/',[ExcelController::class, 'index'])->name('admin.sales');
Route::get('/sales/today/',[ExcelController::class, 'today'])->name('admin.sales.today');