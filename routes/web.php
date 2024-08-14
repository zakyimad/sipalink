<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SipalinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLinkController;
// use App\Http\Controllers\LoginController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [SipalinkController::class, 'index']);

Route::get('/links/{id}', [SipalinkController::class, 'show']);

// Route::get('/dashboard',function(){
//     return view('dashboard.dashboard');
// })->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/setting',function(){
    return view('dashboard.setting');
})->middleware(['auth:sanctum', 'verified']);

// Route::get('/dashboard/links/create', DashboardLinkController::class)->middleware('auth');

Route::resource('/dashboard/links', DashboardLinkController::class)->middleware(['auth:sanctum', 'verified']);

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

// Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
