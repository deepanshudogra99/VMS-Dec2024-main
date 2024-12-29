<?php

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\FmsUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('get-districts', [RegisterController::class, 'getDistricts']);

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
  Route::get('/usermanagement', [SuperAdminController::class, 'usermanagement'])->name('usermanagement');
  Route::get('/addvc', [FmsUserController::class, 'addvc'])->name('addvc');



});

