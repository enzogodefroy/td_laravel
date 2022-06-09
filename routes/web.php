<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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
    return view('welcome');
});

Route::get('/product/{id}', [MainController::class, 'product']);

Route::get('/command/{id}', [MainController::class, 'command']);

Route::get('/validateCommandDetail', [MainController::class, 'validateCommandDetail']);

Route::get('/baskets/{userId}', [MainController::class, 'getUserBaskets'], 'baskets')->name('baskets');

Route::get('/basketDetails/{basketId}', [MainController::class, 'getBasketDetails']);

Route::get('/chooseTimeslot/{basketId}', [MainController::class, 'chooseTimeslot']);

Route::get('/basketValid', [MainController::class, 'basketValid']);