<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');



//NAV
Route::view('/', 'index')->name('index');
Route::view('/players', 'players.index')->name('players');
Route::view('/events', 'events.index')->name('events');
Route::view('/store', 'store.index')->name('store');
Route::view('/contact', 'contact.index')->name('contact');
Route::view('/location', 'location.index')->name('location');

//FOOTER
Route::get('/cookies/policy', function () {
    return view('legal.cookies.policy');
})->name('legal.cookies.policy');

Route::get('/cookies/settings', function () {
    return view('legal.cookies.settings');
})->name('legal.cookies.settings');

Route::get('/privacy/policy', function () {
    return view('legal.privacy.policy');
})->name('legal.privacy.policy');

Route::get('/terms/conditions', function () {
    return view('legal.terms.conditions');
})->name('legal.terms.conditions');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
