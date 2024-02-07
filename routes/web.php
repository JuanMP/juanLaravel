<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;

use App\Http\Controllers\MessageController;


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



//INICIO DE SESION
Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('account', function() {
    return view('users.profile');
})->name('users.profile')
->middleware('auth');

Route::get('/users/profile', [UserController::class, 'show'])->name('users.profile')->middleware('auth');

Route::get('/admin/add-event', 'AdminController@addEvent')->name('admin.add_event');
Route::post('/admin/save-event', 'AdminController@saveEvent')->name('admin.save_event');

Route::get('/admin/add-player', 'AdminController@addPlayer')->name('admin.add_player');
Route::post('/admin/save-player', 'AdminController@savePlayer')->name('admin.save_player');

Route::get('/admin/messages', 'AdminController@messages')->name('admin.messages');
Route::get('/admin/messages/{id}', 'AdminController@showMessage')->name('admin.show_message');
Route::delete('/admin/messages/{id}', 'AdminController@deleteMessage')->name('admin.delete_message');


//JUGADORES
Route::resource('players', PlayerController::class);

//Jugadores, mostrar show


//MENSAJES, RUTAS PROVISIONALES
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::resource('messages', MessageController::class);
Route::get('/messages/create', function () {
    return view('messages.create');
})->name('messages.create');
