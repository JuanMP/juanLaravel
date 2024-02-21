<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;


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

//Ruta Principal
Route::get('/', function () {
    return view('index');
})->name('index');

//Navbar
Route::view('/', 'index')->name('index');
Route::view('/players', 'players.index')->name('players');
Route::view('/events', 'events.index')->name('events');
Route::view('/store', 'store.index')->name('store');
Route::view('/contact', 'contact.index')->name('contact');
Route::view('/location', 'location.index')->name('location');

//Footer
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


//Inicio de Sesión y Registro
Route::get('signup', [LoginController::class, 'signupForm'])->name('signupForm');
Route::post('signup', [LoginController::class, 'signup'])->name('signup');
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


//Ruta que permite acceder a los usuarios o admin, si no será redirigido a Inicio
Route::get('/users/profile', [UserController::class, 'show'])->name('users.profile')->middleware('auth');


//Ruta resource para mensajes

//RUTA TIENDA
Route::resource('products', ProductController::class);

//RUTA EVENTOS
Route::resource('events', EventController::class);

//RUTA PARA EDITAR PERFIL (hecho sin mcr crud)
Route::resource('users', UserController::class);

//Ruta para página Jugadores
Route::resource('players', PlayerController::class);


//Rutas para likes
Route::post('event/{event}/like', [EventController::class, 'eventLike'])->name('event.like');
Route::delete('event/{event}/deleteLike', [EventController::class, 'deleteLike'])->name('event.deleteLike');

//Ruta para enviar mensajes
Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');

//Ruta para acceder a edición si estas logueado
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['auth', 'admin_authenticate']);



//Rutas para Admin
Route::middleware('auth.admin')->group(function () {
    Route::resource('messages', MessageController::class)->except('messages.create');
    //Ruta para añadir evento
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    //Ruta para añadir jugador
    Route::get('players/create', [PlayerController::class, 'create'])->name('players.create');
    //Ruta para la visibilidad de los jugadores
    Route::patch('/players/{player}/visibility', [PlayerController::class, 'updateVisibility'])
        ->name('players.updateVisibility');


});

