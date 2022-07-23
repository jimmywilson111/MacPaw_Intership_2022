<?php

use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DefaultController::class, 'welcome'])->name('welcome');
Route::get('/neo/hazardous', [DefaultController::class, 'index'])->name('index');
Route::get(' /neo/fastest/{hazardous?}', [DefaultController::class, 'list'])->name('list');
Route::get('/asteroids', [DefaultController::class, 'grab'])->name('grab');
