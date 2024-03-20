<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/clients/{type}', [ClientController::class, 'index'])->name('clients');
Route::get('/get-clients', [UserController::class, 'getClients'])->name('getClients');
Route::get('/client-details/{id}', [UserController::class, 'clientDetails'])->name('client.show');


Route::get('/login/{slug?}', [UserController::class, 'index'])->name('login');
Route::post('/postLogin', [UserController::class, 'postLogin'])->name('postLogin');
Route::post('/create-user', [UserController::class, 'createUser'])->name('createUser');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/account', [UserController::class, 'account'])->name('account');

// Route::get('/home',[AdminController::class, 'index'])->name('adminHome');

