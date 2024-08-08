<?php

use Illuminate\Support\Facades\Route;

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