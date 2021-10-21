<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokeController;

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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [PokeController::class, 'home']);

Route::get('/home/surprise', [PokeController::class, 'surprise']);

Route::get('/home/lowest', [PokeController::class, 'lowest']);

Route::get('/home/highest', [PokeController::class, 'highest']);

Route::get('/home/AZ', [PokeController::class, 'AZ']);

Route::get('/home/ZA', [PokeController::class, 'ZA']);

Route::get('/detail/{id?}', [PokeController::class, 'detail']);

Route::get('/home/search', [PokeController::class, 'search']);
